<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index(Request $request)
    {
        $query = Asset::query();

        if ($request->has('search') && $request->search !== null) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('kategori', 'like', '%' . $request->search . '%')
                  ->orWhere('lokasi', 'like', '%' . $request->search . '%');
            });
        }

        $assets = $query->latest()->paginate(10)->withQueryString();
        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
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

    public function show(Asset $asset)
    {
        return view('assets.show', compact('asset'));
    }

    public function edit(Asset $asset)
    {
        return view('assets.edit', compact('asset'));
    }

    public function update(Request $request, Asset $asset)
    {
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

    public function destroy(Asset $asset)
    {
        $asset->delete();

        return redirect()->route('assets.index')
            ->with('success', 'Aset berhasil dihapus!');
    }
}