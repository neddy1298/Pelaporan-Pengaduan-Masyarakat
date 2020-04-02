<?php

use Illuminate\Database\Seeder;

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

        DB::table('petugas')->insert($admin, $petugas);


        factory(\App\Petugas::class, 10)->create();
    }
}
