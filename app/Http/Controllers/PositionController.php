<?php

namespace App\Http\Controllers;

use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {
        return view('positions.index');
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store() {}

    public function show(Position $position) {}

    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    public function update(Position $position) {}

    public function destroy(Position $position) {}
}
