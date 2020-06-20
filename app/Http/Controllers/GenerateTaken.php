<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class GenerateTaken extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);

        }
        /*$users = User::whereHas('roles' => function($q){
            $q->where('name', 'admin');
        })->get();*/
        $token=$user->createToken('user')->plainTextToken;
        $roles = $user->roles()->pluck('name')->toArray();
        return response()->json(['token'=>$token,'data'=>$user,'user'=>$roles]);
        //Auth::user()->roles->pluck('name') ->toArray();
      
       /* $response=[
            'user' => $user,
            'token' => $token
        ];*/
        
        //return response($response);
    }

  
  

}
