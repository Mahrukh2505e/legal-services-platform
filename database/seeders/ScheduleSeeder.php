<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lawyer;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lawyers = Lawyer::all();

        // Define working hours for different lawyers
        $schedules = [
            // Monday to Friday: 9 AM to 5 PM
            [
                'day_of_week' => 1, // Monday
                'start_time' => '09:00',
                'end_time' => '17:00',
            ],
            [
                'day_of_week' => 2, // Tuesday
                'start_time' => '09:00',
                'end_time' => '17:00',
            ],
            [
                'day_of_week' => 3, // Wednesday
                'start_time' => '09:00',
                'end_time' => '17:00',
            ],
            [
                'day_of_week' => 4, // Thursday
                'start_time' => '09:00',
                'end_time' => '17:00',
            ],
            [
                'day_of_week' => 5, // Friday
                'start_time' => '09:00',
                'end_time' => '17:00',
            ],
            [
                'day_of_week' => 6, // Saturday
                'start_time' => '10:00',
                'end_time' => '14:00',
            ],
        ];

        foreach ($lawyers as $lawyer) {
            foreach ($schedules as $schedule) {
                Schedule::create([
                    'lawyer_id' => $lawyer->id,
                    'day_of_week' => $schedule['day_of_week'],
                    'start_time' => $schedule['start_time'],
                    'end_time' => $schedule['end_time'],
                    'slot_duration_minutes' => 60,
                    'max_appointments_per_day' => 8,
                    'is_active' => true,
                ]);
            }
        }
    }
}
