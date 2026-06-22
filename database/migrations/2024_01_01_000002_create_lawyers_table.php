<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lawyers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('bar_council_id')->unique();
            $table->text('bio')->nullable();
            $table->string('license_document')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->integer('experience_years')->default(0);
            $table->decimal('consultation_fee', 10, 2)->default(0);
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('total_reviews')->default(0);
            $table->boolean('is_approved')->default(false);
            $table->timestamp('approval_date')->nullable();
            $table->string('rejection_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->index('city');
            $table->index('state');
            $table->index('is_approved');
            $table->index('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyers');
    }
};
