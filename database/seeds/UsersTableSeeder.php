<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    : void
    {
        Role::create([
            'name' => 'Demonstration',
            'slug' => 'demo',
        ]);

        $role = Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
        ]);

        $user = User::create([
            'first_name' => 'Mateusz',
            'last_name'  => 'Soroka',
            'email'      => 'xmsoroka@gmail.com',
            'password'   => 'test1234',
            'birth_date' => '1996-12-01',
            'phone'      => '789213308',
            'city'       => 'Gdańsk',
            'country'    => 'Poland',
            'role_id'    => $role->id,
        ]);
    }
}
