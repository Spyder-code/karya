<?php

namespace App\Http\Middleware;

use App\Models\PostView;
use Closure;
use Illuminate\Http\Request;

class Visitor
{

    public function handle(Request $request, Closure $next)
    {
        $ip = $request->getClientIp();
        $visitor = PostView::where('ip',$ip)->first();

        if ($visitor!=null) {
            PostView::find($visitor->id)->update([
                'count' => $visitor->count+1,
            ]);
        } else {
            PostView::create([
                'ip' => $ip,
                'count' => 1,
            ]);
        }
        return $next($request);
    }
}
