<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Arsip;
use App\Models\KategoriArsip;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalArsip = Arsip::count();
        $totalKategori = KategoriArsip::count();
        $arsipTerbaru = Arsip::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalArsip',
            'totalKategori',
            'arsipTerbaru'
        ));
    }
}
