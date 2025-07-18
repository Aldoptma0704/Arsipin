<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\KategoriArsip;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = Arsip::where('user_id', $user->id);

        if ($request->filled('q')) {
            $query->where('judul', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('kategori_arsip_id', $request->kategori);
        }

        $arsips = $query->get(); // ->paginate(10) kalau pakai pagination
        $kategoris = KategoriArsip::all();

        return view('users.laporan.index', compact('arsips', 'kategoris'));
    }
}
