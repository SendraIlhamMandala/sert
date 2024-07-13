<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index()
    {
        // Retrieve all users
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        // Show the form for creating a new user
        
    }

    public function store(Request $request)
    {
        // Validate and store the new user
        // Validate the user input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Hash the password before storing
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create and save the new user
        $user = User::create($validatedData);

        // Redirect to the users index page with a success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        // Display the specified user
        $user = User::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }

    public function edit($id)
    {
        // Show the form for editing the specified user
        // Retrieve the user with the given id and pass it to the view
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // Validate and update the specified user

        // Validate the user input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|min:6',
        ]);

        // Hash the password if it was provided
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        // Find the user and update their information
        $user = User::findOrFail($id);
        $user->update($validatedData);

        // Redirect to the users index page with a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
 

    }

    public function destroy($id)
    {
        // Remove the specified user from storage
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');

    }


    public function carinama( Request $request)
    {
     
        $search = $request->input('search');
        $users = User::where('name', 'like', '%' . $search . '%')->get();
        dd($users->pluck('name'));
        return view('user.index', ['users' => $users]);

    }
}
