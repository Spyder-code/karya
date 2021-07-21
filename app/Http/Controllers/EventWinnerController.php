<?php

namespace App\Http\Controllers;

use App\Imports\EventWinnerImport;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\EventWinner;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EventWinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Announcement::all();
        return view('admin.event-winner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = Event::all();
        return view('admin.event-winner.create',compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'note' => 'required',
            'jury_note' => 'required',
            'jury_note' => 'required',
            'file' => 'required|max:2048',
            'file.*' => 'required|max:2048',
        ]);

        $data = Announcement::create($request->all());
        $event = Event::find($request->event_id);
        if($request->file('excel')){
            Excel::import(new EventWinnerImport($data->id), $request->excel);
            $files = $request->file('file');
            foreach ($files as $item ) {
                $fileName = $item->getClientOriginalName();
                $item->move('sertif/'.$event->name, $fileName);
            }
        }
            return redirect()->route('event-winner.index')->with('success','Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventWinner  $eventWinner
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $event_winner)
    {
        $data = EventWinner::all()->where('announcement_id',$event_winner->id);
        $sertif_success_send = EventWinner::all()->where('announcement_id',$event_winner->id)->where('sertif_status',1)->count();
        $sertif_fail_send = EventWinner::all()->where('announcement_id',$event_winner->id)->where('sertif_status',0)->count();
        $announcement = $event_winner;
        return view('admin.event-winner.show',compact('data','announcement','sertif_success_send','sertif_fail_send'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventWinner  $eventWinner
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $event_winner)
    {
        $event = Event::all();
        return view('admin.event-winner.edit',compact('event_winner','event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventWinner  $eventWinner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $event_winner)
    {
        $request->validate([
            'event_id' => 'required',
            'note' => 'required',
            'jury_note' => 'required',
            'jury_note' => 'required',
        ]);

        Announcement::find($event_winner->id)->update($request->all());
        return redirect()->route('event-winner.index')->with('success','Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventWinner  $eventWinner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $event_winner)
    {
        Announcement::destroy($event_winner->id);
        return redirect()->route('event-winner.index')->with('success','Data berhasil dihapus!');
    }

    public function addWinner(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'instagram' => 'required',
            'institution' => 'required',
            'grade' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);
        $announcement = Announcement::find($request->announcement_id);
        $fileName = $request->name.'.'.$request->file->extension();
        $data = array_merge($request->all(),['sertif_name' => $fileName]);
        $request->file->move('sertif/'.$announcement->event->name, $fileName);
        $data = EventWinner::create($data);

        return back()->with('success','Data berhasil disimpan!');
    }

    public function updateWinner(Request $request, EventWinner $winner)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'instagram' => 'required',
            'institution' => 'required',
            'grade' => 'required',
        ]);

        EventWinner::find($winner->id)->update($request->all());
        return back()->with('success','Data berhasil diupdate!');
    }

    public function destroyWinner(EventWinner $winner)
    {
        EventWinner::destroy($winner->id);
        return back()->with('success','Data berhasil dihapus!');
    }
}
