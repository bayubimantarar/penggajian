<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PenggunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengguna')->truncate();

        DB::table('pengguna')->insert(['nama' => 'Finance Department', 'email' => 'finance@technomulti.co.id', 'password' => bcrypt('qwertyui123'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }
}
