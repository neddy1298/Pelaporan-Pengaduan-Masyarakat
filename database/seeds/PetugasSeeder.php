<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'nama_petugas' => 'Neddy A',
            'email' => 'admin@gmail.com',
            'username' => 'admin neddy',
            'password' => bcrypt('admin1298'),
            'telp' => '082125241014',
            'level' => 'admin',
        ];

        $petugas = [
            'nama_petugas' => 'Neddy P',
            'email' => 'petugas@gmail.com',
            'username' => 'petugas neddy',
            'password' => bcrypt('admin1298'),
            'telp' => '082125241014',
            'level' => 'petugas',
        ];

        $neddy = [
            'nama_petugas' => 'Neddy AP',
            'email' => 'neddy1298@gmail.com',
            'username' => 'neddy AP',
            'password' => bcrypt('admin1298'),
            'telp' => '082125241014',
            'level' => 'admin',
        ];

        DB::table('petugas')->insert($admin);
        DB::table('petugas')->insert($petugas);
        DB::table('petugas')->insert($neddy);

        \App\Models\Petugas::factory()->count(10)->create();
    }
}
