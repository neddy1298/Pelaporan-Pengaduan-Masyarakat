<?php

use Illuminate\Database\Seeder;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $masyarakat = [
            'nik' => 'IND01',
            'nama' => 'neddy M',
            'email' => 'masyarakat@gmail.com',
            'username' => 'neddy',
            'password' => bcrypt('admin1298'),
            'telp' => '082125241014',
        ];
        DB::table('masyarakats')->insert($masyarakat);

        factory(\App\Models\Masyarakat::class, 50)->create();
    }
}
