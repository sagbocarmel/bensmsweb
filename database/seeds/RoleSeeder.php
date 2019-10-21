<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->description = 'A normal user';
        $role_user->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'A System Admin';
        $role_admin->save();

        $role_client = new Role();
        $role_client->name = 'Other';
        $role_client->description = 'Autre';
        $role_client->save();
    }
}
