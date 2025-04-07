<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function index() {}

    public function create()
    {
        return view('member.create');
    }

    public function store() {}

    public function show($id) {}

    public function edit($id) {}

    public function update($id) {}

    public function destroy($id) {}
}
