<?php

use Artesaos\Defender\Facades\Defender;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('teste123')
        ]);

        $roleAdmin = \App\Models\RoleModel::create(['name' => 'admin']);
        $roleUser = \App\Models\RoleModel::create(['name' => 'user']);

        $permissionsArray = [
            [
                'readable_name' => 'List all the users',
                'name' => 'admin/users/index'
            ],
            [
                'readable_name' => 'Create user',
                'name' => 'admin/users/create'
            ],
            [
                'readable_name' => 'My user',
                'name' => 'admin/users/my'
            ],
            [
                'readable_name' => 'Edit user',
                'name' => 'admin/users/{id}/edit'
            ],
            [
                'readable_name' => 'Delete user',
                'name' => 'admin/users/{id}/remove'
            ],
            [
                'readable_name' => 'List all roles',
                'name' => 'admin/roles/index'
            ],
            [
                'readable_name' => 'Create roles',
                'name' => 'admin/roles/create'
            ],
            [
                'readable_name' => 'Edit roles',
                'name' => 'admin/roles/{id}/edit'
            ],
            [
                'readable_name' => 'Delete roles',
                'name' => 'admin/roles/{id}/remove'
            ],
            [
                'readable_name' => 'List Permissions Roles',
                'name' => 'admin/permissions/roles'
            ],
            [
                'readable_name' => 'Dashboard Admin',
                'name' => 'admin/home'
            ]
        ];
        foreach ($permissionsArray as $perm){
            $permission = \App\Models\PermissionModel::create($perm);
            $roleAdmin->attachPermission($permission);
        }

        $user->attachRole($roleAdmin);

    }
}
