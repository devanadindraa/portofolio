<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home() {
        $personals = Personal::first();
        if ($personals) {
            session()->put('personal_name', $personals->name);
        }
        return view('home', compact('personals'));
    }

    public function about() {
        $personals = Personal::with('Skills')->first();
        return view('about', compact('personals'));
    }

    public function show_project()
    {
        $projects = Project::with('images')->get();
        return view('project', compact('projects'));
    }

    public function certificate()
    {
        $certificates = Certificate::all();
        return view('certificate', compact('certificates'));
    }
}