<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherManagementController extends Controller
{
    public function index()
    {
        //
        $teachers = User::where('user_type', 'Teacher')->get();
        return view('backend.pages.teacher.index', compact('teachers'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
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
