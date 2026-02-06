<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            ['username' => 'ramdan'],
            [
                'name' => 'Ramdan',
                'email' => 'ramdan@gmail.com',
                'password' => bcrypt('ramdan123'),
                'role' => 'admin',
            ]
        );

        $this->call([
            IdentitasDesaSeeder::class,
            WilayahSeeder::class,
            PendudukSeeder::class,
        ]);
    }
}
