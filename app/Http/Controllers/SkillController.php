<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SkillController extends Controller
{
    public function create_skill() {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        return view('admin.skill.upload_skill');
    }

    public function show_skill() {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
        $skills = Skill::all();
        return view('admin.skill.show_skill', compact('skills'));
    }

    public function edit_skill($id) {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }

        $skill = Skill::findOrFail($id);
        return view('admin.skill.edit_skill', compact('skill'));
    }

    public function store_skill(Request $request)
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
    
        // Validasi input dengan pesan khusus
        $request->validate([
            'skill_name' => 'required|string|max:255',
            'skill_ratio' => 'required|integer|min:0|max:100',
            'experience' => 'required|integer|min:1',
            'period' => 'required|string',
            'img_url' => 'required|mimes:svg',
        ], [
            'skill_name.required' => 'Skill name is required.',
            'skill_name.string' => 'Skill name must be a valid string.',
            'skill_name.max' => 'Skill name must not exceed 255 characters.',
    
            'skill_ratio.required' => 'Skill ratio is required.',
            'skill_ratio.integer' => 'Skill ratio must be a number.',
            'skill_ratio.min' => 'Skill ratio must be at least 0.',
            'skill_ratio.max' => 'Skill ratio cannot be greater than 100.',

            'experience.required' => 'length of experience is required.',
            'experience.integer' => 'length of experience must be a number.',
            'experience.min' => 'length of experience must be at least 1.',
    
            'img_url.required' => 'An SVG image is required.',
            'img_url.mimes' => 'Only SVG files are allowed.',
        ]);
    
        try {
            // Buat data skill
            $skill = Skill::create([
                'skill_name' => $request->skill_name,
                'skill_ratio' => $request->skill_ratio,
                'experience' => $request->experience,
                'period' => $request->period,
                'personal_id' => session('owner_id'),
                'img_url' => null, // Placeholder untuk nanti di-update
            ]);
    
            // Simpan Gambar dengan format skill_id.svg
            if ($request->hasFile('img_url')) {
                $file = $request->file('img_url');
                $filename = $skill->skill_id . '.svg'; // Pastikan format tetap SVG
                $path = $file->storeAs('skill', $filename, 'public'); // Simpan di storage/public/skill
                
                // Update img_url setelah menyimpan gambar
                $skill->update([
                    'img_url' => $path,
                ]);
                Log::info('Image uploaded', ['path' => $path]);
            }
    
            return redirect()->route('admin.show_skill')->with('success', 'Skill uploaded successfully!');
        } catch (\Exception $e) {
            Log::error('Skill upload failed', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'An error occurred while saving the skill!')->withInput();
        }
    }

    public function update_skill(Request $request, $id)
    {
        if (!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must log in first!');
        }
    
        // Validasi input dengan pesan khusus
        $request->validate([
            'skill_name' => 'required|string|max:255',
            'skill_ratio' => 'required|integer|min:0|max:100',
            'img_url' => 'nullable|mimes:svg',
        ], [
            'skill_name.required' => 'Skill name is required.',
            'skill_name.string' => 'Skill name must be a valid string.',
            'skill_name.max' => 'Skill name must not exceed 255 characters.',
    
            'skill_ratio.required' => 'Skill ratio is required.',
            'skill_ratio.integer' => 'Skill ratio must be a number.',
            'skill_ratio.min' => 'Skill ratio must be at least 0.',
            'skill_ratio.max' => 'Skill ratio cannot be greater than 100.',
    
            'img_url.required' => 'An SVG image is required.',
            'img_url.mimes' => 'Only SVG files are allowed.',
        ]);
    
        try {
            // Buat data skill
            $skill = Skill::findOrFail($id);

            $skill->update([
                'skill_name' => $request->skill_name,
                'skill_ratio' => $request->skill_ratio,
                'experience' => $request->experience,
                'period' => $request->period,
            ]);
    
            // Simpan Gambar dengan format skill_id.svg
            if ($request->hasFile('img_url')) {
                $file = $request->file('img_url');

                if ($skill->img_url) {
                    Storage::disk('public')->delete($skill->img_url);
                }

                $filename = $skill->skill_id . '.svg';
                $path = $file->storeAs('skill', $filename, 'public');
                
                if ($path) {
                $skill->update(['img_url' => $path]);
                }
            }
    
            return redirect()->route('admin.show_skill')->with('success', 'Skill updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updated the skill!')->withInput();
        }
    }

    public function delete_skill($id) {
        if(!session()->has('owner_id')) {
            return redirect()->route('admin')->with('error', 'You must login first!');
        }

        try {
            $skill = Skill::findOrFail($id);

            Storage::disk('public')->delete($skill->img_url);
            $skill->delete();
    
            return redirect()->route('admin.show_skill')->with('success', 'Skill delete succesfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occured while delete the skill!')->withInput();
        }
    }
}