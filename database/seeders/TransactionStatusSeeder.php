<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionStatus::create([
            'name' => 'capture'
        ]);
        TransactionStatus::create([
            'name' => 'settlement'
        ]);
        TransactionStatus::create([
            'name' => 'pending'
        ]);
        TransactionStatus::create([
            'name' => 'deny'
        ]);
        TransactionStatus::create([
            'name' => 'cancel'
        ]);
        TransactionStatus::create([
            'name' => 'expire'
        ]);
        TransactionStatus::create([
            'name' => 'refund'
        ]);
        TransactionStatus::create([
            'name' => 'accept'
        ]);
        TransactionStatus::create([
            'name' => 'challenge'
        ]);
    }
}
