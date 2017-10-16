<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Permissions
        $create = Permission::create([
          'name' => 'create',
          'display_name' => 'Create',
          'description' => 'Write Data'
        ]);

        $read = Permission::create([
          'name' => 'read',
          'display_name' => 'Read',
          'description' => 'Read Data'
        ]);

        $update = Permission::create([
          'name' => 'update',
          'display_name' => 'Update',
          'description' => 'Update Data'
        ]);

        $delete = Permission::create([
          'name' => 'delete',
          'display_name' => 'Delete',
          'description' => 'Delete Data'
        ]);

        $addUser = Permission::create([
          'name' => 'add-user',
          'display_name' => 'Add User',
          'description' => 'Add New Administrator'
        ]);

        $deleteUser = Permission::create([
          'name' => 'delete-user',
          'display_name' => 'Delete User',
          'description' => 'Delete Administrator'
        ]);
    }
}
