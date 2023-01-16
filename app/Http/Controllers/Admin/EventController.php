<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    public function store(Request $request)
    {
        $event = new Event();
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'required',
        ]);

        $filename = "";
        $image = $request->file('image');
        if ($image) {
            $filename = $image->store('events', 'public');
        }
        $event->title = $request->title;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->content = $request->content;
        $event->image = $filename;

        $event->save();
        return redirect(route('admin.event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.update', compact('event'));
    }


    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $filename = "";
        $image = $request->file('image');
        if ($image) {
            $filename = $image->store('events', 'public');
        } else {
            $filename = $request->old_image;
        }
        $event->title = $request->title;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->content = $request->content;
        $event->image = $filename;

        $event->save();
        return redirect(route('admin.event'));
    }

    public function delete($id)
    {
        $event = Event::findOrFail($id)->delete();
        return redirect(route('admin.event'));
    }
}
