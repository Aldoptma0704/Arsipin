<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\KategoriArsip;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arsips = Arsip::with('kategori', 'user')->latest()->get();
        return view('admin.arsip.index', compact('arsips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriArsip::all();
        return view('admin.arsip.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_arsip_id' => 'required|exists:kategori_arsips,id',
            'file' => 'required|file|mimes:pdf,docx,xlsx,zip|max:2048',
        ]);

        $filePath = $request->file('file')->store('arsip', 'public');

        Arsip::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
            'kategori_arsip_id' => $request->kategori_arsip_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.arsip.index')->with('success', 'Arsip berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $arsip = Arsip::with('kategori', 'user')->findOrFail($id);
        return view('admin.arsip.show', compact('arsip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $arsip = Arsip::findOrFail($id);
        $kategori = KategoriArsip::all();
        return view('admin.arsip.edit', compact('arsip', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arsip $arsip)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_arsip_id' => 'required|exists:kategori_arsips,id',
            'file' => 'nullable|file|mimes:pdf,docx,xlsx,zip|max:2048',
        ]);

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($arsip->file_path);
            $filePath = $request->file('file')->store('arsip', 'public');
            $arsip->file_path = $filePath;
        }

        $arsip->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori_arsip_id' => $request->kategori_arsip_id,
            'file_path' => $arsip->file_path
        ]);

        return redirect()->route('admin.arsip.index')->with('success', 'Arsip berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arsip $arsip)
    {
        Storage::disk('public')->delete($arsip->file_path);
        $arsip->delete();

        return redirect()->route('admin.arsip.index')->with('success', 'Arsip berhasil dihapus.');
    }
}
