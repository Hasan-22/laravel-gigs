<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'test@gov.com' 
        ]);

        \App\Models\Listing::factory(5)->create([
            'user_id' => $user->id
        ]);
    }
}
