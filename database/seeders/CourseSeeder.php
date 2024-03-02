<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Session;
use App\Models\User;
use App\Models\Room;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()->has(
            Session::factory()->count(5)->state(
                function (array $attributes) {
                    return [
                        'year' => fake()->dateTimeThisYear(),
                        'term' => 'Summer'
                    ];
                }
            )->has(User::factory()->count(3))->has(Room::factory()->count(6))
        )->count(8)->create();
    }
}
