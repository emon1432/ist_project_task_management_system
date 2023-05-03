<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{

    public function index()
    {
        //
        $admins = User::where('user_type', 'Admin')->get();
        return view('backend.pages.admin-list', compact('admins'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());

        $admin = new User();
        $admin->user_type = 'Admin';
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->dob = $request->dob;
        $admin->address = $request->address;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/', $new_image_name);
            $admin->image = $new_image_name;
        }

        $admin->save();
        notify()->success('Admin Added Successfully');
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
