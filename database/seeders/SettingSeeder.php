<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'link_registration' => 'https://docs.google.com/forms/d/1UNFeThxEbZhBDhgAwElKQwOFFeiR3l6sIgEX7XZdC7k/viewform?edit_requested=true',
            'link_guide' => 'https://drive.google.com/file/d/1NEFjtB62GBKx_UFLPcpVL6NkB_9hVFrZ/view',
            'link_upload_post' => 'https://docs.google.com/forms/d/1tALZMATeYnv0GDc7FYPF4S2SxjUKRLdw_KJ4pUpxPtY/viewform?edit_requested=true',
            'link_poster' => 'https://drive.google.com/drive/u/0/mobile/folders/134pKQW6Hacxn8n53_NTKzhVpNI2Uo6mr?usp=sharing',
            'event_id' => 1,
        ]);
    }
}
