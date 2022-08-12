<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\Facades\DataTables;


class AdminController extends Controller
{
    public function dashboard(){
        $user =  session('user');
        return view('dashboard',compact('user'));
    }

    public function signout(){
        session()->flush();
        return redirect()->route('sign_in');
    }

    public function get_users(){
        return DataTables::of(
            DB::select("SELECT a.id, a.fullname, a.email, b.role_name,a.role as role FROM users_tbl a LEFT JOIN roles_db b ON a.role = b.id")
        )->make(true);
    }

    public function get_user_role(){
        return response()->json([
            "results" => DB::select("SELECT id, role_name as text from roles_db")
        ]);
    }
    
    public function register_user(Request $request){
        $data = $request->all();
        $request->validate([
            "fullname" => "required|unique:users_tbl,fullname",
            "email" => "required|email|unique:users_tbl,email",
            "role" => "required",
            "password" => "required|confirmed|min:8",
        ]);
        unset($data['password_confirmation']);
        $data['nominated_password'] = $data['password'];
        DB::table('users_tbl')->insert($data);
        
        return response()->json([
            "message" => "User successfuly added"
        ]);        
    } 

    public function submit_edit(Request $request){
        $data = $request->all();
        $email = $data['email'];
        $fullname = $data['fullname'];
        $password = $data['password'];
        $role = $data['role'];
        $id = $data['id'];
        $original_user_info = DB::select("SELECT * FROM users_tbl WHERE email = '$email'");
        $validate =  [];
        $does_have_tovalidate = false;
        if($original_user_info){
            $check = $original_user_info[0];
            if($fullname != $check->fullname){
                $validate['fullname'] = "required|unique:users_tbl,fullname";
                $does_have_tovalidate = true;
            }
            if($email != $check->email){
                $validate['email'] = "required|email|unique:users_tbl,email";
                $does_have_tovalidate = true;
            }
            if($password != "********"){
                $validate['password'] = "required|min:8";
                $does_have_tovalidate = true;
            }
            if($role != $check->role){
                $validate['role'] = "required";
                $does_have_tovalidate = true;
            }
        }else{
            $request->validate([
                "email" => "required|email|unique:users_tbl,email"
            ]);
        }

        if($does_have_tovalidate){
            $request->validate($validate);
            unset($data['id']);
            DB::table('users_tbl')->where('id', $id)->update($data);
            return response()->json([ 
                "message" => "User successfuly updated"
            ]);
        }
        
        return response()->json([
            "message" => "No updated have been made"
        ]);

    }

    public function delete_user(Request $request){
        $data = $request->all();
        $id = $data['user_id'];
        DB::table('users_tbl')->where('id',$id)->delete();

        return response()->json([
            "message" => "User deleted"
        ]);
    }

    public function get_roles(){
        return DataTables::of(
            DB::select("SELECT * FROM roles_db")
        )->make(true);
    }

    public function register_role(Request $request){
        $data = $request->all();
        $request->validate([
            "role_name" => "required",
            "role_description" => "required",
        ]);

        DB::table('roles_db')->insert($data);
        return response()->json([
            "message" => "Roles successfuly added"
        ]);
    }

    public function delete_role(Request $request){
        $data = $request->all();
        $role_id = $data['role_id'];
        $does_role_allocated = DB::select("SELECT * FROM users_tbl WHERE role = $role_id");
        if($does_role_allocated){
            return response()->json([
                "message" => "Cant delete role, some users are assigned to it"
            ]);
        }
        DB::table('roles_db')->where('id',$role_id)->delete();
        return response()->json([
            "message" => "Role deleted"
        ]);
    }

    public function submit_edit_role(Request $request){
        $data = $request->all();
        $role_id = $data['id'];
        $original_role_info =  DB::select("SELECT * FROM roles_db WHERE id = $role_id");
        $does_have_tovalidate = false;
        $validate = [];
        if($original_role_info){
            $check = $original_role_info[0];
            if($check->role_name != $data['role_name']){
                $does_have_tovalidate = true;
                $validate["role_name"] = 'required';
            }
            if($check->role_description != $data['role_description']){
                $does_have_tovalidate = true;
                $validate["role_description"] = 'required';
            }
        }
        if($does_have_tovalidate){
            $request->validate($validate);
            DB::table('roles_db')->where('id',$role_id)->update($data);
            return response()->json([
                "message" => "Role successfuly modified"
            ]);
        }

        return response()->json([
            "message" => "Nothing is changed."
        ]);
    }
}
