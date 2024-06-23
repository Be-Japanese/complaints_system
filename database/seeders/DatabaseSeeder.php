<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $misurata = City::create([
            'name' => 'Misurata',
            'description' => 'City of Misurata',
            'status' => 'Active',
        ]);
        User::factory()->create([
            'name' => 'Ahmed Mansour',
            'email' => 'ahmed@example.com',
            'city_id' => $misurata->id,
            'status' => 'Active',
        ]);

        $this->call([PermissionSeeder::class]);

        $user = User::find(1);
        $user->assignRole('Super Admin');
    }
}
