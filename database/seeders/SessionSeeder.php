<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Session;
use App\Models\User;
use App\Models\Course;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Session::factory()->recycle(User::where('id', '<', '15'))->recycle(Course::all())->count(6)->create();
    }
}
