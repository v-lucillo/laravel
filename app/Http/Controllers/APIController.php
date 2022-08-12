<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use DB;

class APIController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function signin(Request $request){
        $data = $request->all();
        $email = $data['email'];
        $users =  DB::select("SELECT * FROM users_tbl WHERE email = '$email'");
        if($users){
            if($users[0]->password ==  $data['password']){
                session(["user" => $users[0]]);
                return response()->json([
                    "code" => "103"
                ]);
            }
        }
        throw ValidationException::withMessages(['login_error' => 'The email or password is invalid']);
    }

}
