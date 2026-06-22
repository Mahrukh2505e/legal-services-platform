<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lawyer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'bar_council_id',
        'bio',
        'license_document',
        'address',
        'city',
        'state',
        'zipcode',
        'experience_years',
        'consultation_fee',
        'rating',
        'total_reviews',
        'is_approved',
        'approval_date',
        'rejection_reason',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'approval_date' => 'datetime',
        'consultation_fee' => 'decimal:2',
        'rating' => 'decimal:2',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'lawyer_services')
            ->withPivot('experience_level')
            ->withTimestamps();
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    // Scopes
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopePending($query)
    {
        return $query->where('is_approved', false);
    }

    public function scopeByLocation($query, $city = null, $state = null)
    {
        if ($city) {
            $query->where('city', 'like', "%{$city}%");
        }
        if ($state) {
            $query->where('state', 'like', "%{$state}%");
        }
        return $query;
    }

    public function scopeByRating($query, $minRating = 0)
    {
        return $query->where('rating', '>=', $minRating);
    }

    // Accessors
    public function getFullAddressAttribute()
    {
        return trim("{$this->address}, {$this->city}, {$this->state} {$this->zipcode}");
    }

    public function getAverageRatingAttribute()
    {
        return round($this->rating, 2);
    }

    public function canEditProfile()
    {
        return $this->is_approved || $this->approval_date === null;
    }
}
