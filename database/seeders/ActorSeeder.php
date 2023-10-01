<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\User;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        Actor::factory(10)->create([
            'user_id' => $user->id,
        ]);
    }
}
