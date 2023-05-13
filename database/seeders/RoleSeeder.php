<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    public function run()
    {
        $role = [
            ['name'=>'admin'],
            ['name'=>'guru'],
            ['name'=>'pembimbing_lapangan'],
            ['name'=>'siswa'],
        ];
        foreach ($role as $key => $value) {
            Role::create($value);
        }
    }
}
