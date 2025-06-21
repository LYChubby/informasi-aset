<?php

namespace App\Http\Controllers;

use App\Models\Asset;

class DashboardController extends Controller
{
    public function index()
    {
        
        $latestAssets = Asset::latest()->take(5)->get();
        $totalAllAssets = Asset::count();
        $totalAktif = Asset::where('status', 'aktif')->count();
        $totalPerbaikan = Asset::where('status', 'perbaikan')->count();
        $totalNonAktif = Asset::where('status', 'non-aktif')->count();
        
        return view('dashboard', compact(
            'latestAssets',
            'totalAllAssets',
            'totalAktif',
            'totalPerbaikan',
            'totalNonAktif'
        ));
    }
}