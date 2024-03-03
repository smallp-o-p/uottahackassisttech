<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::factory()->recycle(Thread::all())
            ->recycle(User::all())->count(800)
            ->create();
    }
}
