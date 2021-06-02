<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all()->where('role',2);
        $event = Event::all();
        $eventJuri = EventUser::all();
        return view('admin.juri',compact('data','event','eventJuri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required'
        ]);

        Event::create(['name' =>$request->name]);
        return back()->with('success','Event Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        Event::find($event->id)->update($request->all());

        return back()->with('success','Event updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Event::destroy($event->id);

        return back()->with('success','Event deleted!');
    }

    public function eventJuri(Request $request)
    {
        EventUser::create([
            'users_id' => $request->juri,
            'event_id' => $request->event,
        ]);

        return back()->with('success','Data Created!');
    }

    public function updateActive(Request $request, Event $event)
    {
        $data = intval($request->eventStatus);
        Event::find($event->id)->update([
            'active' => $data
        ]);

        return back()->with('success','Event updated!');
    }
}
