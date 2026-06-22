<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lawyer;
use App\Models\User;
use App\Models\Service;

class LawyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lawyerUsers = User::where('user_type', 'lawyer')->get();
        $services = Service::all();

        $lawyerData = [
            [
                'bar_council_id' => 'BAR/DELHI/2020/001',
                'bio' => 'Experienced criminal lawyer with 15 years of practice in Delhi High Court.',
                'address' => '123 Main Street',
                'city' => 'New Delhi',
                'state' => 'Delhi',
                'zipcode' => '110001',
                'experience_years' => 15,
                'consultation_fee' => 1000,
                'is_approved' => true,
                'approval_date' => now(),
                'serviceIds' => [1, 3], // Criminal, Civil
            ],
            [
                'bar_council_id' => 'BAR/DELHI/2018/002',
                'bio' => 'Specialist in family law and divorce cases with 12 years of experience.',
                'address' => '456 Park Avenue',
                'city' => 'Mumbai',
                'state' => 'Maharashtra',
                'zipcode' => '400001',
                'experience_years' => 12,
                'consultation_fee' => 800,
                'is_approved' => true,
                'approval_date' => now(),
                'serviceIds' => [2, 3], // Divorce, Civil
            ],
            [
                'bar_council_id' => 'BAR/MH/2019/003',
                'bio' => 'Corporate law expert handling mergers and acquisitions.',
                'address' => '789 Business Park',
                'city' => 'Bangalore',
                'state' => 'Karnataka',
                'zipcode' => '560001',
                'experience_years' => 10,
                'consultation_fee' => 1500,
                'is_approved' => true,
                'approval_date' => now(),
                'serviceIds' => [4, 7], // Corporate, Contract
            ],
            [
                'bar_council_id' => 'BAR/KA/2021/004',
                'bio' => 'Property law specialist with expertise in real estate transactions.',
                'address' => '321 Market Street',
                'city' => 'Hyderabad',
                'state' => 'Telangana',
                'zipcode' => '500001',
                'experience_years' => 8,
                'consultation_fee' => 700,
                'is_approved' => true,
                'approval_date' => now(),
                'serviceIds' => [6, 7], // Property, Contract
            ],
            [
                'bar_council_id' => 'BAR/TG/2020/005',
                'bio' => 'Tax and immigration law specialist with international experience.',
                'address' => '654 South Street',
                'city' => 'Chennai',
                'state' => 'Tamil Nadu',
                'zipcode' => '600001',
                'experience_years' => 11,
                'consultation_fee' => 1200,
                'is_approved' => true,
                'approval_date' => now(),
                'serviceIds' => [9, 10], // Immigration, Tax
            ],
        ];

        foreach ($lawyerUsers as $index => $user) {
            if (isset($lawyerData[$index])) {
                $data = $lawyerData[$index];
                $serviceIds = $data['serviceIds'];
                unset($data['serviceIds']);

                // Create lawyer profile
                $lawyer = $user->lawyer()->create($data);

                // Attach services with experience levels
                foreach ($serviceIds as $serviceId) {
                    $lawyer->services()->attach($serviceId, [
                        'experience_level' => rand(0, 1) ? 'expert' : 'intermediate',
                    ]);
                }
            }
        }
    }
}
