<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()
            ->has(Review::factory()->count(3))
            ->count(10)
            ->create();

        $users->each(function ($user) {
            $user->assignRole('customer');
        });
    }
}
