<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Define a common image URL
        $imageUrl = 'https://raw.githubusercontent.com/w15147m/bootstrap5admindashboardmultiple-main/refs/heads/main/images/app-logo.png';

        // Create 2 Users
        $userIds = [];
        for ($i = 1; $i <= 2; $i++) {
            $userIds[] = DB::table('users')->insertGetId([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('123'),
            ]);
        }

        // Create 2 Portfolios
        $portfolioIds = [];
        foreach ($userIds as $userId) {
            $portfolioIds[] = DB::table('portfolios')->insertGetId([
                'user_id' => $userId,
                'name' => 'Portfolio for User ' . $userId,
                'number' => '1234567890',
                'address' => '123 Example Street',
                'image' => $imageUrl,
                'desc' => 'Description for Portfolio for User' . $i,
            ]);
        }

        // Create 10 Skills
        $skillIds = [];
        for ($i = 1; $i <= 10; $i++) {
            $skillIds[] = DB::table('skills')->insertGetId([
                'portfolio_id' => $portfolioIds[array_rand($portfolioIds)],
                'name' => 'Skill ' . $i,
                'proficiency' => rand(60, 100),
                'image' => $imageUrl,
                'desc' => 'Description for Skill ' . $i,
            ]);
        }

        // Create 5 Projects
        $projectIds = [];
        for ($i = 1; $i <= 5; $i++) {
            $projectIds[] = DB::table('projects')->insertGetId([
                'portfolio_id' => $portfolioIds[array_rand($portfolioIds)],
                'name' => 'Project ' . $i,
                'desc' => 'Description for Project ' . $i,
                'link' => 'https://example.com/project' . $i,
            ]);
        }

        // Create Project Images
        foreach ($projectIds as $projectId) {
            for ($i = 1; $i <= 3; $i++) {  // Adding 3 images per project
                DB::table('project_images')->insert([
                    'projects_id' => $projectId,
                    'image' => $imageUrl,
                    'default' => $i === 1,  // Set the first image as default
                ]);
            }
        }

        // Assign Skills to Projects (Pivot Table)
        foreach ($projectIds as $projectId) {
            $randomSkillIds = array_rand($skillIds, 3);
            foreach ($randomSkillIds as $skillIdIndex) {
                DB::table('project_skill')->insert([
                    'projects_id' => $projectId,
                    'skills_id' => $skillIds[$skillIdIndex],
                ]);
            }
        }

        // Create Education Entries
        foreach ($portfolioIds as $portfolioId) {
            for ($i = 1; $i <= 2; $i++) {
                DB::table('education')->insert([
                    'portfolio_id' => $portfolioId,
                    'institution' => 'Institution ' . $i,
                    'degree' => 'Degree ' . $i,
                    'field_of_study' => 'Field ' . $i,
                    'start_date' => now()->subYears(5),
                    'end_date' => now()->subYears(3),
                    'desc' => 'Description for Education ' . $i,
                ]);
            }
        }

        // Create experiences Entries
        foreach ($portfolioIds as $portfolioId) {
            for ($i = 1; $i <= 2; $i++) {
                DB::table('experiences')->insert([
                    'portfolio_id' => $portfolioId,
                    'company' => 'Company ' . $i,
                    'position' => 'Position ' . $i,
                    'image' => $imageUrl,
                    'start_date' => now()->subYears(3),
                    'end_date' => now(),
                    'desc' => 'Description for Experience ' . $i,
                ]);
            }
        }

        // Create Services
        foreach ($portfolioIds as $portfolioId) {
            for ($i = 1; $i <= 3; $i++) {
                DB::table('services')->insert([
                    'portfolio_id' => $portfolioId,
                    'name' => 'Service ' . $i,
                    'image' => $imageUrl,
                    'desc' => 'Description for Service ' . $i,
                ]);
            }
        }

        // Create Social Links
        foreach ($portfolioIds as $portfolioId) {
            for ($i = 1; $i <= 3; $i++) {
                DB::table('social_links')->insert([
                    'portfolio_id' => $portfolioId,
                    'platform' => 'Platform ' . $i,
                    'url' => 'https://example.com/platform' . $i,
                ]);
            }
        }

        // // Create Contacts
        // foreach ($userIds as $userId) {
        //     DB::table('contacts')->insert([
        //         'user_id' => $userId,
        //         'phone' => '1234567890',
        //         'email' => 'contact' . $userId . '@example.com',
        //         'address' => 'Contact Address for User ' . $userId,
        //     ]);
        // }
    }
}
