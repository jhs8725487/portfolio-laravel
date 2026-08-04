<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $technologies = [
            ['name' => 'Laravel', 'category' => 'backend'],
            ['name' => 'PHP', 'category' => 'backend'],
            ['name' => 'MySQL', 'category' => 'database'],
            ['name' => 'Kotlin', 'category' => 'mobile'],
            ['name' => 'Jetpack Compose', 'category' => 'mobile'],
            ['name' => 'Android', 'category' => 'mobile'],
            ['name' => 'JavaScript', 'category' => 'frontend'],
            ['name' => 'HTML', 'category' => 'frontend'],
            ['name' => 'CSS', 'category' => 'frontend'],
            ['name' => 'Tailwind CSS', 'category' => 'frontend'],
            ['name' => 'Blade', 'category' => 'frontend'],
            ['name' => 'Livewire', 'category' => 'frontend'],
            ['name' => 'REST API', 'category' => 'backend'],
            ['name' => 'Git', 'category' => 'tools'],
        ];

        foreach ($technologies as $tech) {
            Technology::create([
                'name' => $tech['name'],
                'slug' => Str::slug($tech['name']),
                'category' => $tech['category'],
            ]);
        }
    }
}