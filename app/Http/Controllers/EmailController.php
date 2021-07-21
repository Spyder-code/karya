<?php

namespace App\Http\Controllers;

use App\Mail\Sertif;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\EventWinner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        set_time_limit(600);
        $data = EventWinner::all()->where('announcement_id',$request->announcement_id)->where('sertif_status',0);
        $announcement = Announcement::find($request->announcement_id);
        $event = Event::find($announcement->event_id);
        $failure = array();
        foreach ($data as $item ) {
            Mail::to($item->email)->send(new Sertif($event,$item->name,$item->sertif_name));
            if (Mail::failures()) {
                array_push($failure,$item->email);
            }else{
                EventWinner::find($item->id)->update(['sertif_status'=>1]);
            };
        }
        $failed = count($failure);
        $succes = $data->count() - $failed;
        return back()->with('success', $succes.' Email berhasil terkirim dan '.$failed.' tidak terkirim');
    }
}
