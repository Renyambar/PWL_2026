<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_barang')->insert([
            ['kategori_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'Aqua 600ml',        'harga_beli' => 2000,  'harga_jual' => 3000,  'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Teh Botol 500ml',   'harga_beli' => 3000,  'harga_jual' => 4500,  'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 2, 'barang_kode' => 'BRG003', 'barang_nama' => 'Indomie Goreng',     'harga_beli' => 2500,  'harga_jual' => 3500,  'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 2, 'barang_kode' => 'BRG004', 'barang_nama' => 'Nasi Bungkus',      'harga_beli' => 8000,  'harga_jual' => 12000, 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 3, 'barang_kode' => 'BRG005', 'barang_nama' => 'Chitato 60gr',      'harga_beli' => 6000,  'harga_jual' => 8000,  'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 3, 'barang_kode' => 'BRG006', 'barang_nama' => 'Oreo Original',     'harga_beli' => 5000,  'harga_jual' => 7000,  'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 4, 'barang_kode' => 'BRG007', 'barang_nama' => 'Sabun Lifebuoy',    'harga_beli' => 4000,  'harga_jual' => 6000,  'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 4, 'barang_kode' => 'BRG008', 'barang_nama' => 'Deterjen Rinso',    'harga_beli' => 12000, 'harga_jual' => 16000, 'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 5, 'barang_kode' => 'BRG009', 'barang_nama' => 'Baterai ABC',       'harga_beli' => 5000,  'harga_jual' => 7500,  'created_at' => now(), 'updated_at' => now()],
            ['kategori_id' => 5, 'barang_kode' => 'BRG010', 'barang_nama' => 'Kantong Plastik',   'harga_beli' => 1000,  'harga_jual' => 2000,  'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
