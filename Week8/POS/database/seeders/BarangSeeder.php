<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_barang')->insert([
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'TV001', 'barang_nama' => 'Televisi', 'harga_beli' => '3000000', 'harga_jual' => 3500000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'HP002', 'barang_nama' => 'Handphone', 'harga_beli' => '2000000', 'harga_jual' => 2500000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'MEJ003', 'barang_nama' => 'Meja', 'harga_beli' => '500000', 'harga_jual' => 700000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'KRS004', 'barang_nama' => 'Kursi', 'harga_beli' => '300000', 'harga_jual' => 450000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'TSH005', 'barang_nama' => 'Kaos', 'harga_beli' => '50000', 'harga_jual' => 75000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'JKT006', 'barang_nama' => 'Jaket', 'harga_beli' => '150000', 'harga_jual' => 200000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'MSG007', 'barang_nama' => 'Mie Instan', 'harga_beli' => '2000', 'harga_jual' => 3000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'SBY008', 'barang_nama' => 'Susu Bubuk', 'harga_beli' => '40000', 'harga_jual' => 55000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'PAR009', 'barang_nama' => 'Paracetamol', 'harga_beli' => '5000', 'harga_jual' => 8000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'VIT010', 'barang_nama' => 'Vitamin C', 'harga_beli' => '10000', 'harga_jual' => 15000],
        ]);
    }
}
