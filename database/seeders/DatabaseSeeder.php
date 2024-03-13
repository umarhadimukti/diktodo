<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        // $this->call(TaskSeeder::class);
        User::factory(10)->create();
        User::create([
            'role_id' => 1,
            'name' => 'Umar Hadi Mukti',
            'username' => 'umarhadimukti',
            'email' => 'umarhadimukti@gmail.com',
            'email_verified_at' => now(),
            'password' => '12344321',
            'image' => 'fotoumar.jpg',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role_id' => 1,
            'name' => 'Admin 1',
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password' => 'Admin1',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'Bang Andre Jr.',
            'username' => 'andreasomethingjr.',
            'email' => 'andrejr@gmail.com',
            'email_verified_at' => now(),
            'password' => '12344321',
            'remember_token' => Str::random(10),
        ]);
    }
}
