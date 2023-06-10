<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamManagementController extends Controller
{
    public function index()
    {
        $teams = Team::with('member1', 'member2')->get();
        $students = User::with('team_member1', 'team_member2')->where('user_type', 'Student')->get();
        // return response()->json($students);
        return view('backend.pages.team-management', compact('teams', 'students'));
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
