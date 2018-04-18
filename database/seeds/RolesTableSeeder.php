<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
          'name' => 'admin',
          'guard_name' => 'web',
        ]);

        $role = Role::create([
          'name' => 'user',
          'guard_name' => 'web',
        ]);

        $role = Role::create([
          'name' => 'iot_device',
          'guard_name' => 'api',
        ]);
    }
}
