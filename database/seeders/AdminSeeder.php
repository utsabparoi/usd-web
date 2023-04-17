<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = array(
            array('id' => '1', 'name' => 'admin', 'email'=>'admin@gmail.com', 'password'=>Hash::make('12345678'), 'is_admin'=>'1', 'status' => '1'),
        );

        foreach ($admins as $admin){
            User::firstOrCreate(
                [
                    'id'            => $admin['id']
                ],
                [
                    'name'          => $admin['name'],
                    'email'         => $admin['email'],
                    'password'      => $admin['password'],
                    'is_admin'      => $admin['is_admin'],
                    'status'        => $admin['status'],
                ]
            );
        }
    }
}
