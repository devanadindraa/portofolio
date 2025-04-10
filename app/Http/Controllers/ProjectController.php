<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    // Tampilkan semua project
    public function admin_show_project()
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        $projects = Project::with('images')->get();
        return view('admin.project.show_project', compact('projects'));
    }
    
    // Tampilkan form upload
    public function create_project()
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        return view('admin.project.upload_project');
    }

    public function edit_project($id){
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        $project = Project::with('images')->findOrFail($id);
        return view('admin.project.edit_project', compact('project'));
    }

    // Simpan project baru
    public function store_project(Request $request)
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        $request->validate([
            'project_name' => 'required|string|max:50',
            'description' => 'required',
            'project_url' => 'nullable|url|max:255',
            'images.*' => 'image|mimes:jpg,png,jpeg,gif|max:5120',
        ], [
            'project_name.required' => 'Nama project wajib diisi!',
            'project_name.max' => 'Nama project maksimal 50 karakter!',
            'description.required' => 'Deskripsi wajib diisi!',
            'images.*.image' => 'File harus berupa gambar!',
            'images.*.mimes' => 'Format gambar harus jpg, png, jpeg, atau gif!',
        ]);

        try {
            // Simpan Project
            $project = Project::create([
                'project_name' => $request->project_name,
                'description' => $request->description,
                'project_url' => $request->project_url ?? null,
            ]);

            // Simpan Gambar dengan format project_id+img_id
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $img_id = ProjectImage::max('img_id') + 1;
                    $filename = $project->project_id . '_' . $img_id . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('uploads', $filename, 'public');
                    ProjectImage::create([
                        'project_id' => $project->project_id,
                        'img_url' => $path,
                    ]);
                }
            }

            return redirect()->route('admin.show_project')->with('success', 'Project uploaded successfully!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while saving the project!')->withInput();
        }
    }


    public function update_project(Request $request, $id)
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        // Validasi input dengan custom messages
        $request->validate([
            'project_name' => 'required|string|max:50',
            'description' => 'required',
            'images.*' => 'image|mimes:jpg,png,jpeg,gif|max:5120',
        ], [
            'project_name.required' => 'Project name is required.',
            'project_name.string' => 'Project name must be a valid string.',
            'project_name.max' => 'Project name cannot exceed 50 characters.',

            'description.required' => 'Project description is required.',

            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Only JPG, PNG, JPEG, and GIF formats are allowed.',
            'images.*.max' => 'Each image size must not exceed 5MB.',
        ]);

        try {
            // Temukan project berdasarkan ID
            $project = Project::findOrFail($id);

            // Update data project
            $project->update([
                'project_name' => $request->project_name,
                'description' => $request->description,
            ]);

            // Jika ada gambar yang ingin dihapus
            if ($request->has('delete_images')) {
                foreach ($request->delete_images as $img_id) {
                    $image = ProjectImage::find($img_id);
                    if ($image) {
                        Storage::disk('public')->delete($image->img_url);
                        $image->delete();
                    }
                }
            }

            // Jika ada gambar baru yang diupload
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $lastId = ProjectImage::max('img_id') ?? 0;
                    $img_id = $lastId + 1;

                    $filename = $project->project_id . '_' . $img_id . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('uploads', $filename, 'public');

                    // Simpan path gambar ke database
                    ProjectImage::create([
                        'project_id' => $project->project_id,
                        'img_url' => $path,
                    ]);
                }
            }

            return redirect()->route('admin.show_project')->with('success', 'Project updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update project. Please try again!')->withInput();
        }
    }

    public function delete_project($id)
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        $project = Project::findOrFail($id);

        $images = ProjectImage::where('project_id', $project->project_id)->get();

        foreach ($images as $image){
            Storage::disk('public')->delete($image->img_url);
            $image->delete();
        }
        
        $project->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.show_project')->with('success', 'Project deleted succesfully!');
    }
}
