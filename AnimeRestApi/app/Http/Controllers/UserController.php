<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'username' => 'required', 
            'email' => 'required|email', 
            'email' => 'unique:users,email',
            'password' => 'required', 
            'confirmPassword' => 'required|same:password', 
        ]);

        $userError=new User([
            'username'=>'error'
            ]);

        if ($validator->fails()) { 
            return $userError;            
        }

        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
       
        return $user; 
    }

    public function login(Request $request){
        
        $user=User::where('email',$request->email)->first();

        if(empty($user)){
                return $user=new User([
                    'username'=>'notfound'
                    ]);
        }else

        if (Hash::check($request->password,$user->password)) {
            return $user;
        }else{
            return $user=new User([
                'username'=>'wrongpassword'
                ]);
        }

    }

    public function find($id){
        return User::findOrFail($id);
    }


    public function updateInfo($id,Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'username' => 'required', 
            'email' => 'required|email', 
            'email' => 'unique:users,email,'.$id,
        ]);

        $userError=new User([
            'username'=>'erroremail'
            ]);

        if ($validator->fails()) { 
            return $userError;            
        }

        $user=User::find($id);

        if(!is_null($user)){
            $user->update([
                'username'=>$request->username,
                'email'=>$request->email
            ]);

        }else{
            $userError=new User([
                'username'=>'error'
                ]);
            return $userError;
        }
       
        return $user; 
    }

    public function updatePassword($id,Request $request){
        $user=User::find($id);

        if (Hash::check($request->password,$user->password)) {
            return $user=new User([
                'username'=>'samepassword'
                ]);
            
        }else{
            $newpass=Hash::make($request->password);
            $user->update([
                'password'=> $newpass
            ]);

            return $user=new User([
                'username'=>'passed'
                ]);
        }


    }

}
