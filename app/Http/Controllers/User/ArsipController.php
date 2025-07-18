<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\KategoriArsip;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index()
    {
        $totalArsip = Arsip::where('user_id', auth()->id())->count();
        $arsips = Arsip::with('kategori')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);
        return view('users.arsip.index', compact('arsips', 'totalArsip'));
    }

    public function create()
    {
        $kategoris = KategoriArsip::all();
        return view('users.arsip.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_arsip_id' => 'required|exists:kategori_arsips,id',
            'file' => 'required|file|mimes:pdf,docx,jpg,jpeg,png|max:10240',
        ]);

        $filePath = $request->file('file')->store('arsip', 'public');

        Arsip::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $filePath,
            'kategori_arsip_id' => $request->kategori_arsip_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('users.arsip.index')->with('success', 'Arsip berhasil ditambahkan.');
    }


    public function show($id)
    {
        $arsip = Arsip::with('kategori', 'user')->findOrFail($id);
        return view('users.arsip.show', compact('arsip'));
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        $kategoris = KategoriArsip::all();
        return view('users.arsip.edit', compact('arsip', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('users.arsip.index')->with('success', 'Arsip berhasil diperbarui.');
    }

    public function destroy(Arsip $arsip)
    {
        Storage::disk('public')->delete($arsip->file_path);
        $arsip->delete();

        return redirect()->route('users.arsip.index')->with('success', 'Arsip berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('q');

        return view('users.arsip.index', []);
    }
}
