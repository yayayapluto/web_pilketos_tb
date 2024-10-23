<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Voting;
use Illuminate\Database\Seeder;
use illuminate\Support\Facades\Hash;
use Illuminate\Support\Stringable;
use Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();
        Candidate::truncate();
        Voting::truncate();

        User::create([
            'user_id' => (string) \Str::uuid(),
            'username' => 'admin',
            'password' => \Hash::make("Smktb@123"),
            'created_by' => 'system',
        ]);

        User::create([
            'user_id' => (string) \Str::uuid(),
            'username' => 'dioBrando',
            'password' => \Hash::make("zawarudo"),
            'created_by' => 'system',
        ]);
        Candidate::factory(3)->create();
        //Voting::factory(100)->create();

        Schema::enableForeignKeyConstraints();
    }
}
