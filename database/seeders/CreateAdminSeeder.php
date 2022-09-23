<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = 'admin@gmail.com';
        $role  = 'Admin';
        if (User::where('email', $email)->orWhere('role', $role)->count() == 0) :
            User::create([
                'name'       => 'Admin',
                'email'      => $email,
                'role'       => $role,
                'password'   => Hash::make('Admin@123'),
            ]);
        endif;
    }
}
