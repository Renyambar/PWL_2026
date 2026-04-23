<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('t_penjualan')->insert([
            ['user_id' => 3, 'pembeli' => 'Budi Santoso',  'penjualan_kode' => 'PJL-001', 'penjualan_tanggal' => '2026-03-01 08:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'pembeli' => 'Siti Aisyah',   'penjualan_kode' => 'PJL-002', 'penjualan_tanggal' => '2026-03-01 09:15:00', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'pembeli' => 'Rudi Hermawan',  'penjualan_kode' => 'PJL-003', 'penjualan_tanggal' => '2026-03-01 10:30:00', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'pembeli' => 'Dewi Puspita',  'penjualan_kode' => 'PJL-004', 'penjualan_tanggal' => '2026-03-01 11:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'pembeli' => 'Andi Wijaya',   'penjualan_kode' => 'PJL-005', 'penjualan_tanggal' => '2026-03-01 12:45:00', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'pembeli' => 'Nina Rahayu',   'penjualan_kode' => 'PJL-006', 'penjualan_tanggal' => '2026-03-01 13:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'pembeli' => 'Hendra Gunawan','penjualan_kode' => 'PJL-007', 'penjualan_tanggal' => '2026-03-01 14:20:00', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'pembeli' => 'Lina Marlina',  'penjualan_kode' => 'PJL-008', 'penjualan_tanggal' => '2026-03-01 15:10:00', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'pembeli' => 'Yono Pratama',  'penjualan_kode' => 'PJL-009', 'penjualan_tanggal' => '2026-03-01 16:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'pembeli' => 'Mega Wati',     'penjualan_kode' => 'PJL-010', 'penjualan_tanggal' => '2026-03-01 17:30:00', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
