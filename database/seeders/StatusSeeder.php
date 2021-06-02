<?php

namespace Database\Seeders;

use App\Models\PostStatus;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        /*
            status post
            0 = pending
            1 = reviewed
            2 = accepted
            3 = Pending to publish
            4 = published
            5 = scheduled
        */
    public function run()
    {
        PostStatus::create([
            'name' => 'pending'
        ]);
        PostStatus::create([
            'name' => 'reviewed'
        ]);
        PostStatus::create([
            'name' => 'accepted'
        ]);
        PostStatus::create([
            'name' => 'Pending to publish'
        ]);
        PostStatus::create([
            'name' => 'Published'
        ]);
        PostStatus::create([
            'name' => 'Scheduled'
        ]);
    }
}
