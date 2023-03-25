<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(['name' => 'Administrator']);
        Role::updateOrCreate(['name' => 'Manager']);
        Role::updateOrCreate(['name' => 'Developer']);
        Role::updateOrCreate(['name' => 'User']);
        Role::updateOrCreate(['name' => 'Customer']); // user_type = 0

        $dataUsers = [
            [
                'name' => 'Administrator',
                'email' => 'super-admin@gmail.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'role' => 'Administrator',
                'user_details' => [
                    'first_name' => 'Administrator',
                    'last_name' => '',
                    'gender' => 1
                ]
            ], 
            [
                'name' => 'Admin Demo',
                'email' => 'demo-admin@gmail.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 99,
                'role' => 'Administrator',
                'user_details' => [
                    'first_name' => 'Admin Demo',
                    'last_name' => '',
                    'gender' => 1
                ]
            ], [
                'name' => 'Trieu 01',
                'email' => 'trieunb+01@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 0,
                'role' => 'Customer',
                'user_details' => [
                    'first_name' => 'Trieu 01',
                    'last_name' => 'Nguyen',
                    'gender' => 1
                ]
            ], [
                'name' => 'Trieu 02',
                'email' => 'trieunb+02@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 0,
                'role' => 'Customer',
                'user_details' => [
                    'first_name' => 'Trieu 02',
                    'last_name' => 'Nguyen',
                    'gender' => 1
                ]
            ], [
                'name' => 'Trieu 03',
                'email' => 'trieunb+03@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 0,
                'role' => 'Customer',
                'user_details' => [
                    'first_name' => 'Trieu 03',
                    'last_name' => 'Nguyen',
                    'gender' => 1
                ]
            ], [
                'name' => 'Customer 01',
                'email' => 'customer1@gmail.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 0,
                'role' => 'Customer',
                'user_details' => [
                    'first_name' => 'Customer',
                    'last_name' => '',
                    'gender' => 1
                ]
            ], [
                'name' => 'Customer 02',
                'email' => 'customer2@gmail.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 0,
                'role' => 'Customer',
                'user_details' => [
                    'first_name' => 'Customer 01',
                    'last_name' => '',
                    'gender' => 1
                ]
            ], [
                'name' => 'Customer 03',
                'email' => 'customer3@gmail.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 0,
                'role' => 'Customer',
                'user_details' => [
                    'first_name' => 'Customer 03',
                    'last_name' => '',
                    'gender' => 1
                ]
            ], [
                'name' => 'Trieu',
                'email' => 'trieunb@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Trieu',
                    'last_name' => 'Nguyen Ba',
                    'gender' => 1
                ]
            ], [
                'name' => 'Tham',
                'email' => 'thamvtn@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Tham',
                    'last_name' => 'Vo Thi Nhu',
                    'gender' => 2
                ]
            ], [
                'name' => 'Dieu',
                'email' => 'dieultb@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Dieu',
                    'last_name' => 'Le Thi Bich',
                    'gender' => 0
                ]
            ], [
                'name' => 'Dung',
                'email' => 'dungvt@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Dung',
                    'last_name' => 'Vo The',
                    'gender' => 0
                ]
            ], [
                'name' => 'Thien',
                'email' => 'thiennd@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Thien',
                    'last_name' => 'Nguyen Duc',
                    'gender' => 1
                ]
            ], [
                'name' => 'Viet',
                'email' => 'viethq@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Viet',
                    'last_name' => 'Huynh Quoc',
                    'gender' => 1
                ]
            ], [
                'name' => 'Thanh',
                'email' => 'thanhdn@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Thanh',
                    'last_name' => 'Dao Ngoc',
                    'gender' => 1
                ]
            ], [
                'name' => 'Lien',
                'email' => 'liennvd@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Lien',
                    'last_name' => 'Nguyen Vu Dieu',
                ]
            ], [
                'name' => 'Anh',
                'email' => 'anhht@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Anh',
                    'last_name' => 'Ho Tuan',
                    'gender' => 1
                ]
            ], [
                'name' => 'Khoi',
                'email' => 'khoipk@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Khoi',
                    'last_name' => 'Pham Ky',
                    'gender' => 1
                ]
            ], [
                'name' => 'Tien',
                'email' => 'tiennp@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Tien',
                    'last_name' => 'Nguyen Phuoc',
                    'gender' => 0
                ]
            ], [
                'name' => 'Thinh',
                'email' => 'thinhth@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Thinh',
                    'last_name' => 'Tran Huu',
                    'gender' => 1
                ]
            ], [
                'name' => 'Quang',
                'email' => 'quangtk@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Quang',
                    'last_name' => 'Tran Kim',
                    'gender' => 1
                ]
            ], [
                'name' => 'Long',
                'email' => 'longhv@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Long',
                    'last_name' => 'Ho Van',
                    'gender' => 1
                ]
            ], [
                'name' => 'Lan',
                'email' => 'lannd@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Lan',
                    'last_name' => 'Nguyen Duc',
                    'gender' => 1
                ]
            ], [
                'name' => 'Nhat',
                'email' => 'nhatnm@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Nhat',
                    'last_name' => 'Nguyen Minh',
                    'gender' => 1
                ]
            ], [
                'name' => 'Ngoan',
                'email' => 'ngoanmc@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Ngoan',
                    'last_name' => 'Mai Cong',
                    'gender' => 1
                ]
            ], [
                'name' => 'Hoang',
                'email' => 'hoangtk@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Hoang',
                    'last_name' => 'Tran Kim',
                    'gender' => 1
                ]
            ], [
                'name' => 'Tuan',
                'email' => 'tuanth@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Tuan',
                    'last_name' => 'Tran Hoang',
                    'gender' => 1
                ]
            ], [
                'name' => 'Can',
                'email' => 'canvtt@concrete-corp.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Can',
                    'last_name' => 'Vo Thi Thuy',
                    'gender' => 0
                ]
            ], [
                'name' => 'Long',
                'email' => 'ong@arcplg.com',
                'password' => \Hash::make('password@123'),
                'status' => 1,
                'user_type' => 1,
                'user_details' => [
                    'first_name' => 'Long',
                    'last_name' => 'Hoang',
                    'gender' => 1
                ]
            ]
        ];
        foreach ($dataUsers as $data) {
            if (!User::where('email', $data['email'])->exists()) {
                $userDetail = $data['user_details'];
                $user = User::create(Arr::except($data, ['user_details', 'role']));
                if (isset($data['role'])) {
                    $user->assignRole($data['role']);
                } else {
                    $user->assignRole('Developer');
                }
                $userDetail['user_id'] = $user->id;
                UserDetail::create($userDetail);
            }
        }
    }
}
