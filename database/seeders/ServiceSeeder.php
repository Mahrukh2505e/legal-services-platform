<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Criminal Law',
                'description' => 'Expert legal representation in criminal cases including defense, prosecution assistance, and appeals.',
                'icon' => '⚖️',
            ],
            [
                'name' => 'Divorce & Family Law',
                'description' => 'Comprehensive legal support for divorce proceedings, custody battles, and family disputes.',
                'icon' => '👨‍👩‍👧‍👦',
            ],
            [
                'name' => 'Civil Law',
                'description' => 'Legal assistance for civil disputes, contract breaches, and personal injury claims.',
                'icon' => '📋',
            ],
            [
                'name' => 'Corporate Law',
                'description' => 'Business law services including contracts, mergers, acquisitions, and corporate compliance.',
                'icon' => '🏢',
            ],
            [
                'name' => 'Affidavit',
                'description' => 'Professional preparation and notarization of affidavits and statutory declarations.',
                'icon' => '📄',
            ],
            [
                'name' => 'Property Law',
                'description' => 'Legal expertise in property transactions, disputes, and real estate matters.',
                'icon' => '🏠',
            ],
            [
                'name' => 'Contract Law',
                'description' => 'Drafting, review, and enforcement of contracts and agreements.',
                'icon' => '📑',
            ],
            [
                'name' => 'Labor Law',
                'description' => 'Employment law services covering disputes, grievances, and worker rights.',
                'icon' => '👷',
            ],
            [
                'name' => 'Immigration Law',
                'description' => 'Visa, immigration, and citizenship-related legal services.',
                'icon' => '✈️',
            ],
            [
                'name' => 'Tax Law',
                'description' => 'Tax advisory and representation for individuals and businesses.',
                'icon' => '💰',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
