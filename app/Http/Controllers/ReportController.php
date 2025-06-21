<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Tampilkan semua laporan (admin: semua, user: hanya miliknya)
    public function index()
    {
        $user = auth()->user();

        $reports = $user->role === 'admin'
            ? AssetReport::latest()->paginate(10)
            : AssetReport::where('user_id', $user->id)->latest()->paginate(10);

        return view('reports.index', compact('reports'));
    }

    // Tampilkan form tambah laporan
    public function create()
    {
        $assets = Asset::all(); // supaya user bisa pilih aset
        return view('reports.create', compact('assets'));
    }

    // Simpan laporan baru
    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:assets,id',
            'title' => 'required|in:perbaikan,penambahan,kerusakan',
            'laporan' => 'required',
        ]);

        $asset = Asset::findOrFail($request->aset_id);

        AssetReport::create([
            'user_id' => auth()->id(),
            'aset_id' => $asset->id,
            'title' => $request->title,
            'nama_aset' => $asset->nama,
            'kategori' => $asset->kategori,
             'deskripsi' => $asset->deskripsi ?? '-',
            'laporan' => $request->laporan,
            'status' => 'belum_ditanggapi',
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dibuat.');
    }

    // Tampilkan detail laporan
    public function show(string $id)
    {
        $report = AssetReport::findOrFail($id);
        return view('reports.show', compact('report'));
    }

    // Tampilkan form edit laporan
    public function edit(string $id)
    {
        $report = AssetReport::findOrFail($id);

        // Validasi agar hanya pemilik atau admin bisa edit
        if (auth()->user()->cannot('update', $report)) {
            abort(403);
        }

        return view('reports.edit', compact('report'));
    }

    // Update laporan
    public function update(Request $request, string $id)
    {
        $report = AssetReport::findOrFail($id);

        if (auth()->user()->cannot('update', $report)) {
            abort(403);
        }

        $request->validate([
            'deskripsi' => 'required',
            'laporan' => 'required',
            'status' => 'in:ditanggapi,belum_ditanggapi'
        ]);

        $report->update($request->only(['deskripsi', 'laporan', 'status']));

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Hapus laporan
    public function destroy(string $id)
    {
        $report = AssetReport::findOrFail($id);

        if (auth()->user()->cannot('delete', $report)) {
            abort(403);
        }

        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
