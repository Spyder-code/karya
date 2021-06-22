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
        ]);

        $data = Announcement::create($request->all());

        if($request->file('excel')){
            Excel::import(new EventWinnerImport($data->id), $request->excel);
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
        $announcement = $event_winner;
        return view('admin.event-winner.show',compact('data','announcement'));
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
            'title' => 'required',
            'instagram' => 'required',
            'institution' => 'required',
            'grade' => 'required',
        ]);

        EventWinner::create($request->all());
        return back()->with('success','Data berhasil disimpan!');
    }

    public function updateWinner(Request $request, EventWinner $winner)
    {
        $request->validate([
            'name' => 'required',
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
