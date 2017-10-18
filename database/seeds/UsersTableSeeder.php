<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $god = Role::where('name', 'super')->first();
        $immortal = Role::where('name', 'admin')->first();

        $super = User::create([
        	'username' => '008207',
        	'user_type' => 'super',
        	'user_group' => 'admin',
        	'email' => 'marvbentinganan@gmail.com',
        	'default_password' => bcrypt('0822012'),
        	'password' => bcrypt('0822012'),
        ]);

        $dob = Carbon::createFromDate(1991, 05, 28)->toDateString();

        $super->profile()->create([
        	'firstname' => 'Marvin',
        	'middlename' => 'Espanola',
        	'lastname' => 'Bentinganan',
        	'gender' => 'male',
        	'date_of_birth' => $dob,
        ]);
        $super->role()->attach($god);
        $super->role()->attach($immortal);
    }   
}
