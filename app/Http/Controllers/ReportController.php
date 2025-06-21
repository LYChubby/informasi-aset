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
        $reports = auth()->user()->is_admin
            ? AssetReport::latest()->paginate(10)
            : AssetReport::where('user_id', auth()->id())->latest()->paginate(10);

        return view('reports.index', compact('reports'));
    }

    // Tampilkan form tambah laporan
    public function create()
    {
        $assets = Asset::all();
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
            'status' => 'belum_ditanggapi', // Default status
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
        
        // Jika user biasa, pastikan laporan miliknya
        if (!auth()->user()->is_admin && $report->user_id !== auth()->id()) {
            abort(403);
        }

        return view('reports.show', compact('report'));
    }

    // Tampilkan form edit laporan
    public function edit(string $id)
    {
        $report = AssetReport::findOrFail($id);

        // Authorization checks
        if (!auth()->user()->is_admin && $report->user_id !== auth()->id()) {
            abort(403);
        }

        // Jika laporan sudah ditanggapi, user tidak bisa edit
        if (!$this->canUserModifyReport($report)) {
            return redirect()->route('reports.index')
                ->with('error', 'Laporan yang sudah ditanggapi tidak dapat diubah.');
        }

        $assets = Asset::all();
        return view('reports.edit', compact('report', 'assets'));
    }

    // Update laporan
    public function update(Request $request, string $id)
{
    $report = AssetReport::findOrFail($id);

    // Authorization checks
    if (!auth()->user()->is_admin && $report->user_id !== auth()->id()) {
        abort(403);
    }

    // Jika laporan sudah ditanggapi, user tidak bisa update
    if (!$this->canUserModifyReport($report)) {
        return redirect()->route('reports.index')
            ->with('error', 'Laporan yang sudah ditanggapi tidak dapat diubah.');
    }

    $validationRules = [
        'title' => 'required|in:perbaikan,penambahan,kerusakan',
        'laporan' => 'required',
        'aset_id' => 'required_if:title,perbaikan,kerusakan|exists:assets,id|nullable',
        'nama_aset' => 'required_if:title,penambahan',
        'kategori' => 'required_if:title,penambahan',
        'lokasi' => 'required_if:title,penambahan',
    ];

    // Tambahkan validasi status hanya untuk admin
    if (auth()->user()->is_admin) {
        $validationRules['status'] = 'sometimes|in:belum_ditanggapi,ditanggapi';
    }

    $request->validate($validationRules);

    $updateData = [
        'title' => $request->title,
        'laporan' => $request->laporan,
    ];

    // Jika admin, update status
    if (auth()->user()->is_admin && $request->has('status')) {
        $updateData['status'] = $request->status;
    }

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

    $report->update($updateData);

    return redirect()->route('reports.index')->with('success', 'Laporan berhasil diperbarui.');
}

    // Hapus laporan
    public function destroy(string $id)
    {
        $report = AssetReport::findOrFail($id);

        // Authorization checks
        if (!auth()->user()->is_admin && $report->user_id !== auth()->id()) {
            abort(403);
        }

        // Jika laporan sudah ditanggapi, user tidak bisa hapus
        if (!$this->canUserModifyReport($report)) {
            return redirect()->route('reports.index')
                ->with('error', 'Laporan yang sudah ditanggapi tidak dapat dihapus.');
        }

        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus.');
    }

    /**
     * Check if user can modify the report
     * User can only modify if report is not responded yet
     * Admin can always modify
     */
    private function canUserModifyReport(AssetReport $report): bool
    {
        return auth()->user()->is_admin || $report->status === 'belum_ditanggapi';
    }
}