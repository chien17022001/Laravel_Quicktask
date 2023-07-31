<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::factory(10)->create();
        Task::factory(10)->create();

        $this->call([
            UserSeeder::class,
        ]);
    }
}
