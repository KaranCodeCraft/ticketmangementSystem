<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show the form to create a new user
    public function create()
    {
        return view('admin.users.create');
    }

    // Store the new user
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,admin'
        ]);
        try {
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => $validatedData['role'],
            ]);

            return redirect()->route('admin.users.index')->with('message', 'User created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.create')->with('error', 'Something went wrong, please try again.');
        }
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Show the form to edit an existing user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:user,admin'
        ]);

        try {
            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $request->filled('password') ? Hash::make($validatedData['password']) : $user->password,
                'role' => $validatedData['role'],
            ]);

            return redirect()->route('admin.users.index')->with('message', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.edit', $user->id)->with('error', 'Something went wrong, please try again.');
        }
    }

    // Show the details of a specific user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();
            return redirect()->route('admin.users.index')->with('message', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.users.index')->with('error', 'Something went wrong, please try again.');
        }
    }
}
