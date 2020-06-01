<?php

namespace App\Http\Controllers;

// Data yang dibutuhkan
use App\User;
use App\Models\Activity;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // ambil data kader dan alumni
        $kader = User::where('role', 'KADER')->count();
        $alumni = User::where('role', 'ALUMNI')->count();
        $jumlah_aktivitas = Activity::all()->count();
        $aktivitas_sukses = Activity::where('finish', 1)->count();
        $jumlah_pk = User::where('role', 'KETUA')
            ->orWhere('role', 'BENDUM')
                ->orWhere('role', 'SEKUM')
                    ->orWhere('role', 'ORGANISASI')->count();

        
        return view('pages.dashboard')->with([
            'kader' => $kader,
            'alumni' => $alumni,
            'jumlah_aktivitas' => $jumlah_aktivitas,
            'aktivitas_sukses' => $aktivitas_sukses,
            'jumlah_pk' => $jumlah_pk
        ]);
    }
}
