<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Seeder
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ]
        );

        // Project 1: Employee Management System
        Project::firstOrCreate(
            ['title' => 'Employee Management System'],
            [
                'description' => 'Developed a full-stack web application featuring an admin dashboard for employee data management...',
                'image' => 'employee_system.png',
                'technologies' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS']),
                'github_link' => 'https://github.com/',
                'live_link' => '#'
            ]
        );

        // Project 2: MoodTracker – Mental Wellness Application
        Project::firstOrCreate(
            ['title' => 'MoodTracker – Mental Wellness Application'],
            [
                'description' => 'Built a full-stack wellness application featuring daily mood logging...',
                'image' => 'moodtracker.png',
                'technologies' => json_encode(['React.js', 'Node.js', 'MongoDB', 'Express']),
                'github_link' => 'https://github.com/',
                'live_link' => '#'
            ]
        );

        // Project 3: FoodScanner – AI Food Safety Analyzer
        Project::firstOrCreate(
            ['title' => 'FoodScanner – AI Food Safety Analyzer'],
            [
                'description' => 'Engineered a cross-platform mobile application using Flutter and Gemini AI...',
                'image' => 'foodscanner.png',
                'technologies' => json_encode(['Flutter', 'Dart', 'Gemini AI', 'OpenRouter API']),
                'github_link' => 'https://github.com/',
                'live_link' => '#'
            ]
        );
    }
}