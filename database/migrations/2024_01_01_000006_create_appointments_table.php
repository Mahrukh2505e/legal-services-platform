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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('lawyer_id')->constrained('lawyers')->onDelete('cascade');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->enum('consultation_type', ['online', 'offline'])->default('online');
            $table->string('meeting_link')->nullable();
            $table->text('location')->nullable();
            $table->text('notes')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->decimal('amount', 10, 2)->default(0);
            $table->enum('payment_status', ['pending', 'completed'])->default('pending');
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();

            // Indexes
            $table->index('customer_id');
            $table->index('lawyer_id');
            $table->index('appointment_date');
            $table->index('status');
            $table->index(['appointment_date', 'lawyer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
