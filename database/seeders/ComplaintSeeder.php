<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('complaint')->insert(
            [
                [
                    'id'    => 1,
                    'id_user'    => 1,
                    'age'    => 20,
                    'nik'    => 123456789,
                    'complaint_contents'    => 'Pelayanan Buruk',
                    'complaint_category'    => 'Pelayanan',
                    'attachment'    => 'uploads/pelayanan.jpg',
                ],
                [
                    'id'    => 2,
                    'id_user'    => 1,
                    'age'    => 20,
                    'nik'    => 123456789,
                    'complaint_contents'    => 'Jalan Buruk',
                    'complaint_category'    => 'Infrastruktur',
                    'attachment'    => 'uploads/081424100_1639480228-0000473714.jpg',
                ],
            ]
        );
        DB::table('complaint_status')->insert(
            [
                [
                    'id'    => 1,
                    'complaint_number'    => 1,
                    'name'    => 'User',
                    'complaint_status'    => 1,
                    'verified_by'    => 'admin',
                ],
                [
                    'id'    => 2,
                    'complaint_number'    => 2,
                    'name'    => 'User',
                    'complaint_status'    => 0,
                    'verified_by'    => '',
                ],
            ]
        );
    }
}
