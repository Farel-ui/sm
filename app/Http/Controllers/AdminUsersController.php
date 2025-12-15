<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderByDesc('created_at')->paginate(6);

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:ADMIN,SUPERADMIN',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = time() . '_' . $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('images/avatar/'), $avatarPath);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'avatar' => $avatarPath,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:ADMIN,SUPERADMIN',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);
        $avatarPath = $user->avatar;

        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($user->avatar && File::exists(public_path('images/avatar/' . $user->avatar))) {
                File::delete(public_path('images/avatar/' . $user->avatar));
            }

            $avatarPath = time() . '_' . $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('images/avatar/'), $avatarPath);
        }

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'avatar' => $avatarPath,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        $page = $request->input('page', 1);

        return redirect()->route('admin.users.index', ['page' => $page])
                         ->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Delete avatar file if exists
        if ($user->avatar && File::exists(public_path('images/avatar/' . $user->avatar))) {
            File::delete(public_path('images/avatar/' . $user->avatar));
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}
