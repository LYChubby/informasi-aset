<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $assets = Asset::when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('kategori', 'like', "%{$search}%")
                      ->orWhere('lokasi', 'like', "%{$search}%")
                      ->orWhere('status', 'like', "%{$search}%")
                      ->orWhere('deskripsi', 'like', "%{$search}%");

            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('reports.index', compact('assets'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Aktif,Perbaikan,Nonaktif',
        ]);

        $asset = Asset::findOrFail($id);
        $asset->status = $request->status;
        $asset->save();

        return back()->with('success', 'Status aset berhasil diperbarui.');
    }
}
