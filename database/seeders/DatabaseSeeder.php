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
        $this->call(TaskSeeder::class);
        User::factory(15)->create();
        User::create([
            'role_id' => 1,
            'name' => 'Umar Hadi Mukti',
            'username' => 'umarhadimukti',
            'email' => 'umarhadimukti@gmail.com',
            'password' => 'Keroncong30',
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role_id' => 1,
            'name' => 'Admin 1',
            'username' => 'admin1',
            'email' => 'admin1@diktodo.test',
            'password' => 'Admin1',
            'remember_token' => Str::random(10),
        ]);
    }
}
