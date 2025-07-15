<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KategoriArsip;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KategoriArsipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $kategoris = [
            'Surat Masuk',
            'Surat Keluar',
            'Dokumen Kepegawaian',
            'Dokumen Keuangan',
            'Nota Dinas',
            'Dokumen Penting Lainnya',
        ];

        foreach ($kategoris as $kategori) {
            DB::table('kategori_arsips')->insert([
                'nama_kategori' => $kategori,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
