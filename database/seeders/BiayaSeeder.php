<?php

namespace Database\Seeders;

use App\Models\Biaya;
use Illuminate\Database\Seeder;

class BiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // biaya reguler
        Biaya::create([
            "kode" => "5100-00-010",
            "item" => "Biaya Uji Kend. Besar",
            "jenis" => "Reguler",
            "kategori" => "Biaya",
            "jumlah" => 50000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-020",
            "item" => "Biaya Uji Kend. Kecil",
            "jenis" => "Reguler",
            "kategori" => "Biaya",
            "jumlah" => 40000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-030",
            "item" => "Biaya Uji Kend. Besar Baru",
            "jenis" => "Reguler",
            "kategori" => "Biaya",
            "jumlah" => 100000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-040",
            "item" => "Biaya Uji Kend. Kecil Baru",
            "jenis" => "Reguler",
            "kategori" => "Biaya",
            "jumlah" => 75000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-050",
            "item" => "Sertifikat Uji",
            "jenis" => "Reguler",
            "kategori" => "Biaya",
            "jumlah" => 15000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-060",
            "item" => "Stiker Hologram",
            "jenis" => "Reguler",
            "kategori" => "Biaya",
            "jumlah" => 15000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-070",
            "item" => "Pembubuhan Nomor Uji",
            "jenis" => "Reguler",
            "kategori" => "Biaya",
            "jumlah" => 25000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5100-00-080",
            "item" => "Uji Emisi",
            "jenis" => "Reguler",
            "kategori" => "Biaya",
            "jumlah" => 20000,
            "persen" => 0,
        ]);

        // biaya lain-lain
        Biaya::create([
            "kode" => "5200-00-010",
            "item" => "Kartu Uji",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 20000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-020",
            "item" => "Buku Uji Emisi",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 20000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-030",
            "item" => "Kartu Uji Rusak",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 50000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-040",
            "item" => "Kartu Uji Hilang / Tidak Sah",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 100000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-050",
            "item" => "Plat, Kawat dan Segel Rusak",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 25000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-060",
            "item" => "Plat, Kawat dan Segel Hilang / Tidak Sah",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 25000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-070",
            "item" => "Tanda Samping dan/atau Stiker Rusak, Hilang, Tidak Sah",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 25000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-080",
            "item" => "1 Paket Kehilangan TBLU",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 150000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-090",
            "item" => "Buku Rusak (Buku Uji, Stiker, Uji Emisi)",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 50000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-110",
            "item" => "Buku Rusak (Buku Uji, Stiker, Uji Emisi)",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 50000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "5200-00-120",
            "item" => "Sertifikat Uji Hilang",
            "jenis" => "Lain - Lain",
            "kategori" => "Biaya",
            "jumlah" => 25000,
            "persen" => 0
        ]);

        // Denda
        Biaya::create([
            "kode" => "4100-00-020",
            "item" => "Denda Kend. Besar",
            "jenis" => "Lain - Lain",
            "kategori" => "Denda",
            "jumlah" => 50000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4100-00-010",
            "item" => "Denda Kend. Kecil",
            "jenis" => "Lain - Lain",
            "kategori" => "Denda",
            "jumlah" => 40000,
            "persen" => 0
        ]);

        Biaya::create([
            "kode" => "4100-00-030",
            "item" => "Denda Retribusi Kend. Besar",
            "jenis" => "Reguler",
            "kategori" => "Denda",
            "jumlah" => 50000,
            "persen" => 0.02
        ]);

        Biaya::create([
            "kode" => "4100-00-040",
            "item" => "Denda Retribusi Kend. Kecil",
            "jenis" => "Reguler",
            "kategori" => "Denda",
            "jumlah" => 40000,
            "persen" => 0.02
        ]);
    }
}
