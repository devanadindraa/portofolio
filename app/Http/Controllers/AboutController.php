<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{

    public function create_about() {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        $personals = Personal::first();
        return view('admin.about.edit_about', compact('personals'));
    }

    public function update_about(Request $request)
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:11',
            'major' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
            'slogan' => 'required|string',
            'biography' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:5120',
        ]);

        // Temukan data personal
        $personal = Personal::first();

        // Update data personal
        $personal->update([
            'name' => $request->name, 
            'nim' => $request->nim,
            'major' => $request->major,
            'faculty' => $request->faculty,
            'slogan' => $request->slogan,
            'biography' => $request->biography,
        ]);

        // Jika ada gambar baru, hapus yang lama dan simpan yang baru
        if ($request->hasFile('image_url')) {
            // Hapus gambar lama jika ada
            if ($personal->img_url) {
                Storage::disk('public')->delete($personal->img_url);
            }

            // Simpan gambar baru
            $filename = 'profile_' . $personal->id . '.' . $request->file('image_url')->getClientOriginalExtension();
            $path = $request->file('image_url')->storeAs('personal', $filename, 'public');

            // Update path gambar di database
            $personal->update(['img_url' => $path]);
        }

        return redirect()->route('admin.create_about')->with('success', 'Profile updated successfully!');
    }
}