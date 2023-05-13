<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    
    public function run()
    {
        $kelas = [
            ['nama_kelas'=>'X-TKJ'],
            ['nama_kelas'=>'XI-TKJ'],
            ['nama_kelas'=>'XII-TKJ'],
            ['nama_kelas'=>'X-PBS'],
            ['nama_kelas'=>'XI-PBS'],
            ['nama_kelas'=>'XII-PBS'],
            ['nama_kelas'=>'X-TKRO'],
            ['nama_kelas'=>'XI-TKRO'],
            ['nama_kelas'=>'XII-TKRO'],
            ['nama_kelas'=>'ALUMNI'],
        ];
        foreach ($kelas as $key => $value) {
            Kelas::create($value);
        }
    }
}
