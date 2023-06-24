<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectTopic;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectManagementController extends Controller
{
    //

    public function proposal()
    {
        $team = Team::with('member1', 'member2')
            ->where('member_1', auth()->user()->id)
            ->orWhere('member_2', auth()->user()->id)
            ->first();

        $projectTopics = ProjectTopic::all();

        $supervisors = User::where('user_type', 'Teacher')->get();

        // return response()->json([
        //     'team' => $team,
        //     'project_topic' => $project_topic,
        //     'supervisors' => $supervisors,
        // ]);

        return view('backend.pages.project.proposal', compact('team', 'supervisors', 'projectTopics'));
    }

    public function proposalStore(Request $request)
    {
        // return response()->json($request->all());

        $request->validate([
            'team_id' => 'required',
            'project_topic_id' => 'required',
            'supervisor_id' => 'required',
        ]);

        $project = new Project();
        $project->team_id = $request->team_id;
        $project->supervisor_id = $request->supervisor_id;
        $project->project_topic_id = $request->project_topic_id;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->save();

        notify()->success('Project Proposal Submitted Successfully');
        return redirect('/dashboard');
    }
}
