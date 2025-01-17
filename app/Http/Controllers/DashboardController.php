<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role->rol_deskripsi;
        // dd($user);
        // dd($role);
        

        if ($role == 'Mahasiswa') {
            $kelompok = $user->kelompok;
            $project = $kelompok ? $kelompok->project : null;
            $projects = $project ? collect([$project]) : collect();
            return view('dashboard.index', compact('projects'));
        } elseif ($role == 'Admin') {
            $projects = Project::all();
            return view('dashboard.index', compact('projects'));
        } else {
            return abort(403, 'Unathorized Action');
        }
    }
}
