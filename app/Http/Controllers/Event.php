<?php

namespace App\Http\Controllers;

use App\Models\Event as EventModel;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Event extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('showEvent', 'showEvents');
    }

    public function addEvent(Request $request)
    {

        $checked = $request->validate([
            'title' => 'required|unique:event',
            'description' => 'required',
            'start_date' => 'required|date',
        ]);

        $path = $request->file('image')->store('public/images');
        $fileName = str_replace('public', '', $path);
        $checked = array_merge($checked, ['image' => $fileName, 'user_id' => Auth::id()]);

        EventModel::create($checked);

        return redirect('/');
    }

    public function deleteEvent($id, EventModel $post)
    {

        $post = EventModel::find($id);
        
        if($post->user_id != Auth::id()){
            abort(403);
        }

        $post->delete();

        return redirect('/');
    }

    public function showUpdate($id){
        $event=EventModel::find($id);
        return view('events.update', ['event'=>$event]);
    }

    public function updateEvent(Request $request, $id, EventModel $post)
    {
        
        $post = EventModel::find($id);

        if($post->user_id != Auth::id()){
            abort(403);
        }

        $checked = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'start_date' => 'date',
        ]);

        if ($request->image) {
            $path = $request->file('image')->store('public/images');
            $fileName = str_replace('public', '', $path);
            $checked = array_merge($checked, ['image' => $fileName]);

            Storage::delete($post->image);
        }

        $post->title = $checked['title'];
        $post->description = $checked['description'];
        $post->start_date = $checked['start_date'];
        $post->image = $checked['image'];

        $post->save();

        return redirect()->back();
    }

    public function showAddEvents()
    {
        return view('events.addEvent');
    }

    public function showEvents()
    {
        $events = EventModel::all();

        return view('events.events', compact('events'));
    }

    public function showEvent(Request $request, $id)
    {
        $event = EventModel::find($id);

        return view('events.event', ['event' => $event]);
    }
    
    public function contacts()
    {
        return view('contacts');
    }
    public function aboutus()
    {
        return view('aboutus');
    }
}
