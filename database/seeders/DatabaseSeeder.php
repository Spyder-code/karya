<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            StatusSeeder::class,
            TypeSeeder::class,
            PostSeeder::class,
            TransactionStatusSeeder::class,
            PaymentMethodSeeder::class,
        ]);
    }
}
