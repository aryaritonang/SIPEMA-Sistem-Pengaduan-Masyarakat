<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert(
            [
                [
                    'id'    => '1',
                    'username'    => 'admin',
                    'password'    => Hash::make('password'),
                    'account_type'    => 'admin',
                ],
                [
                    'id'    => '2',
                    'username'    => 'ary1007',
                    'password'    => Hash::make('katakunci'),
                    'account_type'    => 'user',
                ],
                [
                    'id'    => '3',
                    'username'    => 'permana123',
                    'password'    => Hash::make('apakah'),
                    'account_type'    => 'user',
                ],
            ]
        );
    }
}
