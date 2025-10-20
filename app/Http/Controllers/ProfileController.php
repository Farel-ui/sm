<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profil.
     */
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }

    /**
     * Form edit profil.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update profil user (nama, email, avatar).
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Validasi data dasar
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Kalau user upload avatar baru
        if ($request->hasFile('avatar')) {
            // Hapus avatar lama kalau ada
            if ($user->avatar && file_exists(public_path('images/avatar/' . $user->avatar))) {
                unlink(public_path('images/avatar/' . $user->avatar));
            }

            // Simpan avatar baru
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/avatar'), $filename);

            $user->avatar = $filename;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Hapus akun user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Hapus avatar user.
     */
    public function destroyAvatar(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if ($user->avatar && file_exists(public_path('images/avatar/' . $user->avatar))) {
            unlink(public_path('images/avatar/' . $user->avatar));
        }

        $user->avatar = null;
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'avatar-deleted');
    }
}
