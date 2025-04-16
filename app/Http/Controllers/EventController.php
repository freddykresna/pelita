<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index() {}

    public function create()
    {
        return view('events.create');
    }

    public function store() {}

    public function show(Event $event) {}

    public function edit(Event $event) {}

    public function update(Event $event) {}

    public function destroy(Event $event) {}
}
