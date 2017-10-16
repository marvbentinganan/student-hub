<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all = Permission::all();
        $selected = Permission::where('name', '!=', 'add-user')->where('name', '!=', 'delete-user')->get();
        $read = Permission::where('name', 'read')->first();

        $super = Role::create([
          'name' => 'super',
          'display_name' => 'Super Administrator',
          'description' => 'God Mode'
        ]);

        $super->permission()->attach($all);

        $admin = Role::create([
          'name' => 'admin',
          'display_name' => 'Administrator',
          'description' => 'Immortal'
        ]);

        $admin->permission()->attach($selected);

        $staff = Role::create([
          'name' => 'student',
          'display_name' => 'Student',
          'description' => 'Mortal'
        ]);

        $staff->permission()->attach($selected);
    }
}
