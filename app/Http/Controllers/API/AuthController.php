<?php

/*namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
}*/

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors()]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //$accessToken = $user->createToken('authToken')->accessToken;
        //return response([ 'user' => $user, 'access_token' => $accessToken]);
        return response(['success'=>true,'user' => $user,'message'=>'User Registered Successfully']);
    }

    public function login(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors()]);
        }

        if (!auth()->attempt($data)) {
            return response(['message' => 'Login credentials are invaild']);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            //return redirect()->intended('dashboard')
            //->withSuccess('You have Successfully loggedin');
            $userId = Auth::id();
            $name = Auth::user()->name;
            $email = Auth::user()->email;
            $user = array('id'=>$userId,'name'=>$name,'email'=>$email);
            return response(['success'=>true,'message'=>'Login Successfull','data'=>$user]);
        }

        //$accessToken = auth()->user()->createToken('authToken')->accessToken;
        //return response(['access_token' => $accessToken]);
        //return response(['success'=>true,'message' => 'Login Successfull', 'data'=>'stallion']);

    }
}
