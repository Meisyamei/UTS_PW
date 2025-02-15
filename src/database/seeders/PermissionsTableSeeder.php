<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'frontend_access',
            ],
            [
                'id'    => 18,
                'title' => 'data_create',
            ],
            [
                'id'    => 19,
                'title' => 'data_edit',
            ],
            [
                'id'    => 20,
                'title' => 'data_show',
            ],
            [
                'id'    => 21,
                'title' => 'data_delete',
            ],
            [
                'id'    => 22,
                'title' => 'data_access',
            ],
            [
                'id'    => 23,
                'title' => 'dosen_edit',
            ],
            [
                'id'    => 24,
                'title' => 'dosen_show',
            ],
            [
                'id'    => 24,
                'title' => 'dosen_delete',
            ],
            [
                'id'    => 25,
                'title' => 'dosen_access',
            ],
            [
                'id'    => 26,
                'title'=> 'mhs_create',
            ],
            [
                'id'    => 27,
                'title'=> 'mhs_edit',
            ],
            [
                'id'    => 28,
                'title'=> 'mhs_show',
            ],
            [
                'id'    => 29,
                'title'=> 'mhs_delete',
            ],
            [
                'id'    => 30,
                'title'=> 'mhs_access',
            ],
            [
                'id'    => 31,
                'title' => 'data_password_edit',
            ],
            [
                'id'    => 32,
                'title' => 'dosen_create',
            ],
        ];

        Permission::insert($permissions);
    }
}
