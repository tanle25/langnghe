<?php

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 'super-admin',
            'status' => 1,
            'password' => bcrypt('1'),
        ]);
        DB::table('shops')->insert([
            'username' => 'hrm',
            'email' => 'hrm@gmail.com',
            'user_id' => 1,
            'created_by' => 1,
            'status' => 1,
            'tencs' => 'Hàm Rồng Media',
            'loaidn' => 1,
            'huyen' => 1,
            'xa' => 1,
            'xom' => 'Đường Thanh Chương',
            'dt' => '0968724886',
            'nganhql' => 1,
            'loaigiayto' => 1,
            'sogiay' => 'EDF2019',
            'coquancp' => 'IT THANH HÓA',
            'ngaycap' => '20/12/2018',
            'image' => 'image1',
            'nguoidaidien' => 'Nguyễn Sỹ Mạnh',
            'quymo' => 1,
            'password' => bcrypt('1'),
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyễn Minh Dũng',
            'username' => 'dungnm',
            'provider' => 'web',
            'provider_id' => 'web',
            'status' => 1,
            'point' => 0,
            'password' => bcrypt('1'),
        ]);
    }
}
