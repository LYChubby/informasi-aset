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
            'title' => 'required|in:perbaikan,penambahan,kerusakan',
            'laporan' => 'required',
            'aset_id' => 'required_if:title,perbaikan,kerusakan|exists:assets,id|nullable',
            'nama_aset' => 'required_if:title,penambahan',
            'kategori' => 'required_if:title,penambahan',
            'lokasi' => 'required_if:title,penambahan',
        ]);

        $reportData = [
            'user_id' => auth()->id(),
            'title' => $request->title,
            'laporan' => $request->laporan,
            'status' => 'belum_ditanggapi',
        ];

        if ($request->title === 'penambahan') {
            $reportData['nama_aset'] = $request->nama_aset;
            $reportData['kategori'] = $request->kategori;
            $reportData['lokasi'] = $request->lokasi;
            $reportData['aset_id'] = null;
        } else {
            $asset = Asset::findOrFail($request->aset_id);
            $reportData['aset_id'] = $asset->id;
            $reportData['nama_aset'] = $asset->nama;
            $reportData['kategori'] = $asset->kategori;
            $reportData['lokasi'] = $asset->lokasi;
        }

        AssetReport::create($reportData);

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

        if (auth()->user()->cannot('update', $report)) {
            abort(403);
        }

        $assets = Asset::all();
        return view('reports.edit', compact('report', 'assets'));
    }

    // Update laporan
    public function update(Request $request, string $id)
    {
        $report = AssetReport::findOrFail($id);

        if (auth()->user()->cannot('update', $report)) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|in:perbaikan,penambahan,kerusakan',
            'laporan' => 'required',
            'aset_id' => 'required_if:title,perbaikan,kerusakan|exists:assets,id|nullable',
            'nama_aset' => 'required_if:title,penambahan',
            'kategori' => 'required_if:title,penambahan',
            'lokasi' => 'required_if:title,penambahan',
        ]);

        $updateData = [
            'title' => $request->title,
            'laporan' => $request->laporan,
        ];

        if ($request->title === 'penambahan') {
            $updateData['nama_aset'] = $request->nama_aset;
            $updateData['kategori'] = $request->kategori;
            $updateData['lokasi'] = $request->lokasi;
            $updateData['aset_id'] = null;
        } else {
            $asset = Asset::findOrFail($request->aset_id);
            $updateData['aset_id'] = $asset->id;
            $updateData['nama_aset'] = $asset->nama;
            $updateData['kategori'] = $asset->kategori;
            $updateData['lokasi'] = $asset->lokasi;
        }

        // Jangan update status di sini (hanya admin nanti yang boleh)
        $report->update($updateData);

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
