<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Traits\HasRoles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
          'name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => Hash::make('adminadmin'),
          'remember_token' => Hash::make('admin@admin.com'),
        ]);
        $user->assignRole('admin');
    }
}
