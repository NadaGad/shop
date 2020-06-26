<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserApiresourse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

   
    public function update(Request $request, $id)
    {

        $user = User::find($id);

      if($request->has('first_name'))  {

        $user->first_name = $request->get('first_name');
      }

      if($request->has('last_name'))  {

        $user->last_name = $request->get('last_name');

       }

      if($request->has('email'))  {

        $user->email = $request->get('email');

        }

          $user->save();
 
 
       return new UserApiresourse($user);
 
    }



   public function register(Request $request)
   {
       $request->validate([
           'first_name' => 'required',
           'last_name' => 'required',
           'email' => 'required',
           'password' => 'required',
       ]);
       $user = new User();

         $user->first_name = $request->input('first_name');
         $user->last_name = $request->input('last_name');
         $user-> email = $request->input('email');
         $user->password = Hash::make($request->input('password'));
         $user->api_token = bin2hex(openssl_random_pseudo_bytes(30));

         $user->save();


      return new UserApiresourse($user);

   }

   public function login(Request $request){
       $request->validate([
           'email' => 'required',
           'password' => 'required',
       ]);
       $username = $request->only('email');
       $credentials = $request->only('email','password');

       if (Auth::attempt($credentials)){
           $user = User::where('email',$username)->first();
           return new UserApiresourse($user);

       }
       $message = [
           'error' => true,
           'message'=> 'error'
       ];

       return response($message, 401);

   }
}
