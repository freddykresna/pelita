<?php

namespace App\Http\Controllers;

use App\Models\Position;

class PositionController extends Controller
{
    public function create()
    {
        return view('positions.create');
    }

    public function store() {}

    public function show(Position $position) {}

    public function edit(Position $position) {}

    public function update(Position $position) {}

    public function destroy(Position $position) {}
}
