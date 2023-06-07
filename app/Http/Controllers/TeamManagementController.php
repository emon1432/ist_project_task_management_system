<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamManagementController extends Controller
{
    public function index()
    {
        $students = User::where('user_type', 'Student')->get();
        return view('backend.pages.team-management', compact('students'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->member_1 = auth()->user()->id;
        $team->member_2 = $request->member2;
        $team->save();

        notify()->success('Team Created Successfully');
        return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
