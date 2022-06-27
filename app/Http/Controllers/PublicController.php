<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Models\Event;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Resources\Event as EventResources;


class PublicController extends Controller
{
    public function getEvents(){
        $events = Event::get();

        return EventResources::collection(Event::get());

        // return $events;
    }

    // public function getAjax()
    // {
    //     $results = Event::get();

    //     foreach ($results as $key => $event) {
    //         $ids = $event->id;
    //         unset($event->id);
    //         $event->event_id = $ids;
    //     }

    //     return DataTables::of($results)
    //                     ->addIndexColumn()
    //                     ->make(true);
    // }


    // public function create()
    // {
    //     return view('events.create');
    // }

    // public function store(Request $request)
    // {
    //     // dd($request->toArray());
    //     $request->validate([
    //         'name'          => 'bail|required|min:5|max:100',
    //         'status'        => 'required',
    //         'start_at'      => 'required|date|after:tomorrow',
    //         'end_at'        => 'required|date|after:start_at',
    //     ],[
    //         'name.required'     => 'Event Name is required.',
    //         'status.required'   => 'Status is required.',
    //         'start_at.required' => 'Event Start At is required.',
    //         'end_at.required'   => 'Event End At is required.',
    //     ]);

    //     $event = new Event();
    //     $event->name = $request->name;
    //     $event->status = $request->status;
    //     $event->start_at = $request->start_at;
    //     $event->end_at = $request->end_at;

    //     $event->save();

    //     return response()->json(['success'=>'Successfully']);
    // }

    // public function show($id)
    // {
    //     $event = Event::find($id);
    //     return view('events.show', compact('event'));
    // }

    // public function edit($id)
    // {
    //     $event = Event::find($id);
    //     $id = $event->id;
    //     unset($event->id);
    //     $event->event_id = $id;
    //     return $event;
    // }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'name'          => 'bail|required|min:5|max:100',
    //         'status'        => 'required',
    //         'start_at'      => 'required|date|after:tomorrow',
    //         'end_at'        => 'required|date|after:start_at',
    //     ],[
    //         'name.required'     => 'Event Name is required.',
    //         'status.required'   => 'Status is required.',
    //         'start_at.required' => 'Event Start At is required.',
    //         'end_at.required'   => 'Event End At is required.',
    //     ]);

    //     $event = Event::find($request->id);
    //     $event->name = $request->name;
    //     $event->status = $request->status;
    //     $event->start_at = $request->start_at;
    //     $event->end_at = $request->end_at;

    //     $event->save();

    //     return response()->json(['success'=>'Successfully']);
    // }

    // public function destroy($id)
    // {
    //     Event::findOrFail($id)->forceDelete();
    //     return response()->json(true);
    // }

    // public function softDelete($id)
    // {
    //     Event::findOrFail($id)->delete();
    //     return response()->json(true);
    // }
}
