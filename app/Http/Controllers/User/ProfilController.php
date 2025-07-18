<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('users.profil.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'foto' => 'nullable|image|max:2048', // max 2MB
        ]);

        // Simpan file foto jika diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && Storage::exists('public/' . $user->foto)) {
                Storage::delete('public/' . $user->foto);
            }

            $path = $request->file('foto')->store('foto_profil', 'public');
            $user->foto = $path;
        }

        // Update nama dan email
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        /** @var \App\Models\User $user */
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
