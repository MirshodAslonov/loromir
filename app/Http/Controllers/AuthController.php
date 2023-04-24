<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Database\QueryException;

class AuthController extends Controller
{
    private function auth($email,$password){
        $credentials =[
            'email'=>$email,
            'password'=>$password
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('welcome');
        }else{
            return redirect()->back();
        }
    }
    
    public function login(LoginRequest $request) {
        return $this->auth($request->email,$request->password);
    }

    public function register(RegisterRequest $request){
        $user= new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->phone=$request['phone'];
        $user->password=bcrypt($request['password']);
        try {
            $user->save();
           return $this->auth($request->email,$request->password);
        }catch (QueryException $e){
            return response()->json(['error'=>['message'=>$e->getMessage(),'code'=>4551515]],400);
        }
    }

    public function logout(){
        Auth::logout();
        return view('login.login');
    }
}
