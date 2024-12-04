<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'nik' => '1376012310010005',
            'nama' => 'Neddy',
            'email' => 'neddy@gmail.com',
            'username' => 'neddy',
            'password' => bcrypt('neddy1298'),
            'telp' => '082125241014',
            'active' => 0,
        ];
        DB::table('masyarakats')->insert($masyarakat);

        \App\Models\Masyarakat::factory()->count(50)->create();
    }
}
