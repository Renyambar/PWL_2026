<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('t_stok')->insert([
            ['supplier_id' => 1, 'barang_id' => 1,  'user_id' => 2, 'stok_tanggal' => '2026-02-28 08:00:00', 'stok_jumlah' => 100, 'created_at' => now(), 'updated_at' => now()],
            ['supplier_id' => 1, 'barang_id' => 2,  'user_id' => 2, 'stok_tanggal' => '2026-02-28 08:30:00', 'stok_jumlah' => 80,  'created_at' => now(), 'updated_at' => now()],
            ['supplier_id' => 2, 'barang_id' => 3,  'user_id' => 2, 'stok_tanggal' => '2026-02-28 09:00:00', 'stok_jumlah' => 150, 'created_at' => now(), 'updated_at' => now()],
            ['supplier_id' => 2, 'barang_id' => 4,  'user_id' => 2, 'stok_tanggal' => '2026-02-28 09:30:00', 'stok_jumlah' => 50,  'created_at' => now(), 'updated_at' => now()],
            ['supplier_id' => 3, 'barang_id' => 5,  'user_id' => 2, 'stok_tanggal' => '2026-02-28 10:00:00', 'stok_jumlah' => 120, 'created_at' => now(), 'updated_at' => now()],
            ['supplier_id' => 3, 'barang_id' => 6,  'user_id' => 2, 'stok_tanggal' => '2026-02-28 10:30:00', 'stok_jumlah' => 90,  'created_at' => now(), 'updated_at' => now()],
            ['supplier_id' => 1, 'barang_id' => 7,  'user_id' => 2, 'stok_tanggal' => '2026-02-28 11:00:00', 'stok_jumlah' => 200, 'created_at' => now(), 'updated_at' => now()],
            ['supplier_id' => 2, 'barang_id' => 8,  'user_id' => 2, 'stok_tanggal' => '2026-02-28 11:30:00', 'stok_jumlah' => 60,  'created_at' => now(), 'updated_at' => now()],
            ['supplier_id' => 3, 'barang_id' => 9,  'user_id' => 2, 'stok_tanggal' => '2026-02-28 12:00:00', 'stok_jumlah' => 75,  'created_at' => now(), 'updated_at' => now()],
            ['supplier_id' => 1, 'barang_id' => 10, 'user_id' => 2, 'stok_tanggal' => '2026-02-28 12:30:00', 'stok_jumlah' => 500, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
