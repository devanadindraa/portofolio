<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CertificateController extends Controller
{
    // Tampilkan semua certif
    public function admin_show_certif()
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        $certificates = Certificate::all();
        return view('admin.certificate.show_certif', compact('certificates'));
    }
    // Tampilkan form upload
    public function create_certif()
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        return view('admin.certificate.upload_certif');
    }
    // Tampilkan form edit
    public function edit_certif($id)
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        $certificate = Certificate::findOrFail($id);
        return view('admin.certificate.edit_certif', compact('certificate'));
    }


    public function store_certif(Request $request)
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        $request->validate([
            'certif_name' => 'required|string|max:50',
            'certif_link' => 'nullable|url|max:255',
            'img_url' => 'required|image|mimes:jpg,png,jpeg,gif|max:5120',
        ], [
            'certif_name.required' => 'Certificate name is required!',
            'certif_name.max' => 'Certificate name must not exceed 50 characters!',
            'certif_link.url' => 'Invalid URL format!',
            'img_url.required' => 'Image is required!',
            'img_url.image' => 'File must be an image!',
            'img_url.mimes' => 'Image format must be jpg, png, jpeg, or gif!',
        ]);
    
        try {
            // Simpan Certificate
            $certificate = Certificate::create([
                'certif_name' => $request->certif_name,
                'certif_link' => $request->certif_link ?? null,
            ]);
    
            // Simpan Gambar dengan format certif_id.extension
            if ($request->hasFile('img_url')) {
                $file = $request->file('img_url');
                $filename = $certificate->certif_id . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('certificate', $filename, 'public');
    
                // Update img_url setelah menyimpan gambar
                $certificate->update([
                    'img_url' => $path,
                ]);
                Log::info('Image uploaded', ['path' => $path]);
            }
    
            return redirect()->route('admin.show_certif')->with('success', 'Certificate uploaded successfully!');
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while saving the certificate!')->withInput();
        }
    }

    public function update_certif(Request $request, $id)
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        $request->validate([
            'certif_name' => 'required|string|max:50',
            'certif_link' => 'nullable|url|max:255',
            'img_url' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:5120',
        ], [
            'certif_name.required' => 'Certificate name is required.',
            'certif_name.string' => 'Certificate name must be a valid string.',
            'certif_name.max' => 'Certificate name cannot exceed 50 characters.',
    
            'certif_link.url' => 'Certificate link must be a valid URL.',
            'certif_link.max' => 'Certificate link cannot exceed 255 characters.',
    
            'img_url.image' => 'The uploaded file must be an image.',
            'img_url.mimes' => 'Only JPG, PNG, JPEG, and GIF formats are allowed.',
            'img_url.max' => 'Image size must not exceed 5MB.',
        ]);

    
        try {
            $certif = Certificate::findOrFail($id);
    
            // Update certificate data (tanpa gambar dulu)
            $certif->update([
                'certif_name' => $request->certif_name,
                'certif_link' => $request->certif_link ?? null,
            ]);
    
            // Jika ada file gambar baru di-upload
            if ($request->hasFile('img_url')) {
                $file = $request->file('img_url');
    
                // Hapus gambar lama jika ada
                if ($certif->img_url) {
                    Storage::disk('public')->delete($certif->img_url);
                }
    
                // Simpan gambar baru
                $filename = $certif->certif_id . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('certificate', $filename, 'public');
    
                // Update img_url hanya jika penyimpanan berhasil
                if ($path) {
                    $certif->update(['img_url' => $path]);
                }
            }
    
            return redirect()->route('admin.show_certif')->with('success', 'Certificate updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while saving the certificate!')->withInput();
        }
    }    

    public function delete_certif($id)
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        try {
            $certif = Certificate::findOrFail($id);
    
            // Hapus gambar jika ada
            if ($certif->img_url) {
                Storage::disk('public')->delete($certif->img_url);
            }
    
            // Hapus sertifikat dari database
            $certif->delete();
    
            // Redirect dengan pesan sukses
            return redirect()->route('admin.show_certif')->with('success', 'Certificate deleted successfully!');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Failed to delete certificate. Please try again!');
        }
    }    
}