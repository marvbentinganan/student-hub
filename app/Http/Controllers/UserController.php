<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShsStudent;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Redirect;
use Session;
use Excel;
use DB;

class UserController extends Controller
{
    public function index(){
    	return view('settings.user-management');
    }

    public function store(Request $request){
        $role = Role::where('name', 'student')->first();
    	if($request->hasFile('file')){
    		$file = $request->file('file');
    		$path = $file->getRealPath();
    		$data = Excel::load($path, function($reader){})->get();
    		if($data->count() != 0){
    			foreach ($data as $record) {
    				//format username to match student ID
    				$year = substr($record->raw_id, 0, -4);
    				$id = substr($record->raw_id, 4);
    				$username = $id.'-'.substr($year, 2);

                    $dob = $record->date_of_birth->toDateString();

                    $birth = str_replace("-", "", $dob);

                    $last = strtolower(rtrim($record->lastname));

    				$password = bcrypt($birth.$last);

                    $check = User::where('username', $username)->first();
                    
                    if($check == null){
                        $user = User::updateOrCreate(['username' => $username], [
                            'username' => $username,
                            'user_type' => 'student',
                            'user_group' => 'college',
                            'default_password' => $password,
                            'password' => $password,
                        ]);

                        $user->profile()->create([
                            'firstname' => strtolower(rtrim($record->firstname)),
                            'middlename' => strtolower(rtrim($record->middlename)),
                            'lastname' => strtolower(rtrim($record->lastname)),
                            'date_of_birth' => $record->date_of_birth,
                        ]);

                        $user->role()->attach($role);
                    }
    			}
    		}
            Session::flash('flash_message_info', 'College Student Information added successfully');
    		return Redirect::back();
    	}
    }

    public function migrateSHS(Request $request){
        if($request->confirmation == true){
            $users = ShsStudent::all();
            // $users = DB::connection('pgsql_shs')->table('mod_users')->select('firstname', 'middlename', 'lastname', 'user_id', 'password')->where('user_role', 'student')->get();
            dump($users);
        }
    }
}
