<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriArsip;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = KategoriArsip::latest()->get();
        return view('users.kategori.index', compact('kategoris'));
    }
}
