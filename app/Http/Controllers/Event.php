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
        if (!Gate::allows('modify-event', $post)) {
            return abort(403);
        }

        $post = EventModel::find($id);

        $post->delete();

        return redirect()->back();
    }

    public function updateEvent(Request $request, $id, EventModel $post)
    {
        if (!Gate::allows('modify-event', $post)) {
            return abort(403);
        }

        $post = EventModel::find($id);

        $checked = $request->validate([
            'title' => 'required|unique:posts',
            'description' => 'required',
            'start_date' => 'required|date',
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
