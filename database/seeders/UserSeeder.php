<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            [
                'name'    => 'ary',
                'username'    => 'ary1007',
                'password'   =>  Hash::make('katakunci'),
                'id_account'   =>  '2',
            ],
            [
                'name'    => 'permana',
                'username'    => 'permana123',
                'password'   =>  Hash::make('apakah'),
                'id_account'   =>  '3',
            ]
        ]);
    }
}
