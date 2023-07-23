<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskManagementController extends Controller
{
    //
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $task = new Task();
        $task->project_id = $request->project_id;
        $task->team_id = $request->team_id;
        $task->supervisor_id = $request->supervisor_id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->started_at = str_replace('T', ' ', $request->started_at);
        $task->ended_at = str_replace('T', ' ', $request->ended_at);
        $task->save();

        notify()->success('Task created successfully.');
        return redirect()->back();
    }

    // studentPendingTask
    public function studentPendingTask($id)
    {
        $tasks = Task::with('project', 'team', 'team.member1', 'team.member2', 'supervisor')
            ->where('project_id', $id)
            ->where('team_id', auth()->user()->team->id)
            ->where('ended_at', '>=', Carbon::now())
            ->get();
        // return response()->json($tasks);
        return view('backend.pages.student.task.pending', compact('tasks'));
    }
}
