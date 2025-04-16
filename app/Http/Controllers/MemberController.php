<?php

namespace App\Http\Controllers;

use App\Models\Member;

class MemberController extends Controller
{
    public function index() {}

    public function create()
    {
        return view('member.create');
    }

    public function store() {}

    public function show(Member $member) {}

    public function edit(Member $member) {}

    public function update(Member $member) {}

    public function destroy(Member $member) {}
}
