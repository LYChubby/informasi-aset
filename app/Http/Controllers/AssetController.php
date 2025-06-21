<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    // Tampilkan semua aset (admin: semua, user: hanya bisa melihat)
    public function index(Request $request)
    {
        $query = Asset::query();

        // Search functionality
        if ($request->has('search') && $request->search !== null) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%')
                  ->orWhere('lokasi', 'like', '%' . $request->search . '%');
            });
        }

        $assets = $query->orderBy('updated_at', 'desc')->paginate(10)->withQueryString();
        return view('assets.index', compact('assets'));
    }

    // Tampilkan form tambah aset (hanya admin)
    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        
        return view('assets.create');
    }

    // Simpan aset baru (hanya admin)
    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|string|in:aktif,perbaikan,non-aktif',
            'tanggal_pembelian' => 'required|date',
            'nilai' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        Asset::create($request->all());

        return redirect()->route('assets.index')
            ->with('success', 'Aset berhasil ditambahkan!');
    }

    // Tampilkan detail aset
    public function show(Asset $asset)
    {
        return view('assets.show', compact('asset'));
    }

    // Tampilkan form edit aset (hanya admin)
    public function edit(Asset $asset)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        
        return view('assets.edit', compact('asset'));
    }

    // Update aset (hanya admin)
    public function update(Request $request, Asset $asset)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'status' => 'required|string|in:aktif,perbaikan,non-aktif',
            'tanggal_pembelian' => 'required|date',
            'nilai' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $asset->update($request->all());

        return redirect()->route('assets.index')
            ->with('success', 'Aset berhasil diperbarui!');
    }

    // Hapus aset (hanya admin)
    public function destroy(Asset $asset)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        
        $asset->delete();

        return redirect()->route('assets.index')
            ->with('success', 'Aset berhasil dihapus!');
    }
}