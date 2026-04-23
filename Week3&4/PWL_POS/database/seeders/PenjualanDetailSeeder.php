<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('t_penjualan_detail')->insert([
            // Penjualan 1
            ['penjualan_id' => 1, 'barang_id' => 1, 'harga' => 3000,  'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 1, 'barang_id' => 3, 'harga' => 3500,  'jumlah' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 1, 'barang_id' => 5, 'harga' => 8000,  'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            // Penjualan 2
            ['penjualan_id' => 2, 'barang_id' => 2, 'harga' => 4500,  'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 2, 'barang_id' => 6, 'harga' => 7000,  'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 2, 'barang_id' => 9, 'harga' => 7500,  'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
            // Penjualan 3
            ['penjualan_id' => 3, 'barang_id' => 4,  'harga' => 12000, 'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 3, 'barang_id' => 7,  'harga' => 6000,  'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 3, 'barang_id' => 10, 'harga' => 2000,  'jumlah' => 5, 'created_at' => now(), 'updated_at' => now()],
            // Penjualan 4
            ['penjualan_id' => 4, 'barang_id' => 1, 'harga' => 3000,  'jumlah' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 4, 'barang_id' => 8, 'harga' => 16000, 'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 4, 'barang_id' => 5, 'harga' => 8000,  'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
            // Penjualan 5
            ['penjualan_id' => 5, 'barang_id' => 2,  'harga' => 4500,  'jumlah' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 5, 'barang_id' => 3,  'harga' => 3500,  'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 5, 'barang_id' => 10, 'harga' => 2000,  'jumlah' => 3, 'created_at' => now(), 'updated_at' => now()],
            // Penjualan 6
            ['penjualan_id' => 6, 'barang_id' => 6, 'harga' => 7000,  'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 6, 'barang_id' => 7, 'harga' => 6000,  'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 6, 'barang_id' => 9, 'harga' => 7500,  'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            // Penjualan 7
            ['penjualan_id' => 7, 'barang_id' => 4, 'harga' => 12000, 'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 7, 'barang_id' => 1, 'harga' => 3000,  'jumlah' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 7, 'barang_id' => 8, 'harga' => 16000, 'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            // Penjualan 8
            ['penjualan_id' => 8, 'barang_id' => 3,  'harga' => 3500,  'jumlah' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 8, 'barang_id' => 5,  'harga' => 8000,  'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 8, 'barang_id' => 10, 'harga' => 2000,  'jumlah' => 10, 'created_at' => now(), 'updated_at' => now()],
            // Penjualan 9
            ['penjualan_id' => 9, 'barang_id' => 2, 'harga' => 4500,  'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 9, 'barang_id' => 6, 'harga' => 7000,  'jumlah' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 9, 'barang_id' => 7, 'harga' => 6000,  'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
            // Penjualan 10
            ['penjualan_id' => 10, 'barang_id' => 9,  'harga' => 7500,  'jumlah' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 10, 'barang_id' => 4,  'harga' => 12000, 'jumlah' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 10, 'barang_id' => 8,  'harga' => 16000, 'jumlah' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
