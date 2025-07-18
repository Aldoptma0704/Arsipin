<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriArsip;

class KategoriArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = KategoriArsip::latest()->get();
        return view('admin.kategori_arsip.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori_arsip.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_arsips,nama_kategori',
        ]);

        KategoriArsip::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori-arsip.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriArsip $kategori_arsip)
    {
        return view('admin.kategori_arsip.edit', compact('kategori_arsip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriArsip $kategori_arsip)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori_arsips,nama_kategori,' . $kategori_arsip->id,
        ]);

        $kategori_arsip->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('admin.kategori-arsip.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriArsip $kategori_arsip)
    {
        $kategori_arsip->delete();
        return redirect()->route('admin.kategori-arsip.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
