<?php

use App\UserRole;
use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new UserRole();
        $user->user_id = 1;
        $user->role_id = 2;
        $user->save();
    }
}
