<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'sagbo';
        $user->email = 'sagbocarmel@gmail.com';
        $user->school_name = 'Pere Aupiais Cadjehoun';
        $user->address = 'Cotonou';
        $user->phone_number = '+22967811382';
        $user->password =  bcrypt('Yo8@&#my096+');
        $user->save();
    }
}
