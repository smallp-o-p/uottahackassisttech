<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class RoleGiver extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (User::all() as $user) {
            if ($user->id % 5 == 0) {
                $user->assignRole("professor");
            } else if ($user->id % 3 == 0) {
                $user->assignRole('ta');
            } else if ($user->id % 2 == 0) {
                $user->assignRole('student');
            }
        }
    }
}
