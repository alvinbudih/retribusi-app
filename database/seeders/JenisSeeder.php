<?php

namespace Database\Seeders;

use App\Models\JenisKendaraan;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKendaraan::create([
            "nama_jenis" => "PICK UP",
            "konversi_jenis" => "MOBIL BARANG BAK TERBUKA"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "DUMPTRUCK",
            "konversi_jenis" => "MOBIL BARANG BAK TERBUKA"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "TRUCK",
            "konversi_jenis" => "MOBIL BARANG BAK TERBUKA"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "BOX",
            "konversi_jenis" => "MOBIL BARANG BAK TERTUTUP"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "TANKI",
            "konversi_jenis" => "MOBIL TANGKI"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "MICROBUS",
            "konversi_jenis" => "MOBIL BUS SEDANG"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "ANGKOT",
            "konversi_jenis" => "MOBIL BUS KECIL"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "BUS MINI",
            "konversi_jenis" => "MOBIL BUS KECIL"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "TRACTORHEAD",
            "konversi_jenis" => "MOBIL PENARIK"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "TRONTON TRUCK",
            "konversi_jenis" => "MOBIL BARANG BAK TERBUKA"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "KEND KHUSUS",
            "konversi_jenis" => "KENDARAAN KHUSUS"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "AMBULANCE",
            "konversi_jenis" => "KENDARAAN KHUSUS"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "DEREK",
            "konversi_jenis" => "KENDARAAN KHUSUS"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "BESTEL WAGON",
            "konversi_jenis" => "KENDARAAN KHUSUS"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "CONCRETE PUMP",
            "konversi_jenis" => "KENDARAAN KHUSUS"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "NKBWU",
            "konversi_jenis" => "MOBIL BAK TERBUKA"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "FORKLIFT",
            "konversi_jenis" => "MOBIL BAK TERTUTUP"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "DOUBLE CABIN",
            "konversi_jenis" => "MOBIL BARANG BAK TERBUKA"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "MIXER",
            "konversi_jenis" => "KENDARAAN KHUSUS"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "TRONTON BOX",
            "konversi_jenis" => "MOBIL BARANG BAK TERTUTUP"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "MOBIL BUS",
            "konversi_jenis" => "MOBIL BUS BESAR"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "TRUCK CRANE",
            "konversi_jenis" => "KENDARAAN KHUSUS"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "TRUCK CRANE",
            "konversi_jenis" => "MOBIL BARANG BAK TERBUKA"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "PICK UP BOX",
            "konversi_jenis" => "MOBIL BARANG BAK TERTUTUP"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "BUS",
            "konversi_jenis" => "MOBIL BUS BESAR"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "TRUCK FLAT DECK",
            "konversi_jenis" => "MOBIL BARANG BAK TERBUKA"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "TEMPELAN",
            "konversi_jenis" => "KERETA TEMPELAN BAK TERBUKA"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "TEMPELAN TANGKI",
            "konversi_jenis" => "KERETA TEMPELAB BAK TERTUTUP"
        ]);

        JenisKendaraan::create([
            "nama_jenis" => "KERETA GANDENGAN",
            "konversi_jenis" => "KERETA GANDENG BAK TERBUKA"
        ]);
    }
}
