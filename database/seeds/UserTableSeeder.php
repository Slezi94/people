<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Ambrus Csaba', 'email' => 'ambrus.csaba@nik.uni-obuda.hu', 'dept' => 'Dékáni Hivatal', 'rank' => 'műszaki ügyintéző', 'phone' => '+36 (1) 666-5510', 'room' => 'BA.2.11'],
            ['name' => 'B. Kiss Judit', 'email' => 'bkiss.judit@nik.uni-obuda.hu', 'dept' => 'Alkalmazott Informatikai Intézet', 'rank' => 'igazgatási ügyintéző', 'phone' => '+36 (1) 666-5550', 'room' => 'BA.3.13'],
            ['name' => 'Balázs Éva', 'email' => 'balazs.eva@nik.uni-obuda.hu', 'dept' => 'Dékáni Hivatal', 'rank' => 'igazgatási ügyintéző', 'phone' => '+36 (1) 666-5520', 'room' => 'BA.4.06']
        ];

        DB::table('users')->insertOrIgnore($users);
    }
}
