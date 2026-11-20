<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Donasi\Database\Seeders\DonasiSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

      User::updateOrCreate(
            ['email' => 'admin@FoodShare.test'],
            ['name' => 'Admin FoodShare', 'role' => UserRole::Admin, 'password' => 'admin12345']
        );
          User::updateOrCreate(
            ['email' => 'Pemohon@FoodShare.test'],
            ['name' => 'Pemohon Contoh', 'role' => UserRole::Pemohon, 'password' => 'password']
        );
        $this->call(DonasiSeeder::class);
    }
}
