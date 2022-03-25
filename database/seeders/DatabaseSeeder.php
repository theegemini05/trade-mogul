<?php

namespace Database\Seeders;

use App\Models\Depot;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()
        ->count(15)
        ->create();

        Depot::factory()
        ->count(2)
        ->state(new Sequence(
            ['name' => 'Nairobi'],
            ['name' => 'Mombasa']
        ))
        ->has(
            User::factory()
            ->count(5)
        )
        ->create();
    }
}
