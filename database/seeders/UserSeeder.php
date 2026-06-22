<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@legal.com',
            'username' => 'admin_user',
            'password' => Hash::make('password123'),
            'user_type' => 'admin',
            'phone' => '+91-9876543210',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create sample lawyers
        $lawyers = [
            [
                'name' => 'Rajesh Kumar',
                'email' => 'rajesh.kumar@legal.com',
                'username' => 'rajesh_lawyer',
                'phone' => '+91-9876543211',
            ],
            [
                'name' => 'Priya Singh',
                'email' => 'priya.singh@legal.com',
                'username' => 'priya_lawyer',
                'phone' => '+91-9876543212',
            ],
            [
                'name' => 'Amit Patel',
                'email' => 'amit.patel@legal.com',
                'username' => 'amit_lawyer',
                'phone' => '+91-9876543213',
            ],
            [
                'name' => 'Neha Verma',
                'email' => 'neha.verma@legal.com',
                'username' => 'neha_lawyer',
                'phone' => '+91-9876543214',
            ],
            [
                'name' => 'Vikram Sharma',
                'email' => 'vikram.sharma@legal.com',
                'username' => 'vikram_lawyer',
                'phone' => '+91-9876543215',
            ],
        ];

        foreach ($lawyers as $lawyer) {
            User::create([
                'name' => $lawyer['name'],
                'email' => $lawyer['email'],
                'username' => $lawyer['username'],
                'password' => Hash::make('password123'),
                'user_type' => 'lawyer',
                'phone' => $lawyer['phone'],
                'is_active' => true,
                'email_verified_at' => now(),
            ]);
        }

        // Create sample customers
        $customers = [
            [
                'name' => 'John Smith',
                'email' => 'john.smith@example.com',
                'username' => 'john_customer',
                'phone' => '+91-9000000001',
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@example.com',
                'username' => 'sarah_customer',
                'phone' => '+91-9000000002',
            ],
            [
                'name' => 'Michael Brown',
                'email' => 'michael.brown@example.com',
                'username' => 'michael_customer',
                'phone' => '+91-9000000003',
            ],
            [
                'name' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'username' => 'emily_customer',
                'phone' => '+91-9000000004',
            ],
            [
                'name' => 'Robert Wilson',
                'email' => 'robert.wilson@example.com',
                'username' => 'robert_customer',
                'phone' => '+91-9000000005',
            ],
        ];

        foreach ($customers as $customer) {
            User::create([
                'name' => $customer['name'],
                'email' => $customer['email'],
                'username' => $customer['username'],
                'password' => Hash::make('password123'),
                'user_type' => 'customer',
                'phone' => $customer['phone'],
                'is_active' => true,
                'email_verified_at' => now(),
            ]);
        }
    }
}
