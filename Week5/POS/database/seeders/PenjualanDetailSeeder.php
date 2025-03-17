<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'barang_id' => 1, 'jumlah' => 3],
            ['penjualan_id' => 2, 'barang_id' => 4, 'jumlah' => 3],
            ['penjualan_id' => 3, 'barang_id' => 7, 'jumlah' => 3],


            ['penjualan_id' => 4, 'barang_id' => 10, 'jumlah' => 3],


            ['penjualan_id' => 5, 'barang_id' => 3, 'jumlah' => 3],


            ['penjualan_id' => 6, 'barang_id' => 6, 'jumlah' => 3],
 

            ['penjualan_id' => 7, 'barang_id' => 9, 'jumlah' => 3],
   
            ['penjualan_id' => 8, 'barang_id' => 2, 'jumlah' => 3],


            ['penjualan_id' => 9, 'barang_id' => 5, 'jumlah' => 3],

            ['penjualan_id' => 10, 'barang_id' => 8, 'jumlah' => 3],
   
        ];

        foreach ($data as &$item) {
            // Ambil harga_jual dari tabel m_barang berdasarkan barang_id
            $harga_jual = DB::table('m_barang')
                ->where('barang_id', $item['barang_id'])
                ->value('harga_jual');

            // Hitung total harga
            $item['harga'] = $harga_jual * $item['jumlah'];
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}
