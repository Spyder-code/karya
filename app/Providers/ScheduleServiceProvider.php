<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\ServiceProvider;

class ScheduleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $now = date("Y-m-d H:i:s");
        // $post = Post::all()->where('status',4);
        // foreach ($post as $item) {
        //     if ($item->schedule<=$now) {
        //         Post::find($item->id)->update(['status'=>5]);
        //     }
        // }
    }
}
