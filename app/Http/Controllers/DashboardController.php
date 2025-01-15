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

        if ($role === 'Mahasiswa') {
            $kelompok = $user->kelompok;
            $project = $kelompok ? $kelompok->project : null;
            return view('dashboard.mahasiswa', compact('project'));
        } elseif ($role === 'Admin') {
            $projects = Project::all();
            return view('dashboard.admin', compact($projects));
        } else {
            return abort(403, 'Unathorized Action');
        }
    }
}
