<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            ['supplier_kode' => 'SUP001', 'supplier_nama' => 'PT Maju Jaya',      'supplier_alamat' => 'Jl. Raya No. 1, Malang',    'created_at' => now(), 'updated_at' => now()],
            ['supplier_kode' => 'SUP002', 'supplier_nama' => 'CV Berkah Abadi',   'supplier_alamat' => 'Jl. Setia Budi No. 5, Surabaya', 'created_at' => now(), 'updated_at' => now()],
            ['supplier_kode' => 'SUP003', 'supplier_nama' => 'UD Sumber Rejeki',  'supplier_alamat' => 'Jl. Pasar Besar No. 10, Batu',   'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
