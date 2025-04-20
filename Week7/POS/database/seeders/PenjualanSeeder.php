<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('t_penjualan')->insert([
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Pembeli 1',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Pembeli 2',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Pembeli 3',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Pembeli 4',
                'penjualan_kode' => 'PJ004',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Pembeli 5',
                'penjualan_kode' => 'PJ005',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Pembeli 6',
                'penjualan_kode' => 'PJ006',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Pembeli 7',
                'penjualan_kode' => 'PJ007',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Pembeli 8',
                'penjualan_kode' => 'PJ008',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Pembeli 9',
                'penjualan_kode' => 'PJ009',
                'penjualan_tanggal' => Carbon::now(),
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Pembeli 10',
                'penjualan_kode' => 'PJ010',
                'penjualan_tanggal' => Carbon::now(),
            ],
        ]);
    }
}
