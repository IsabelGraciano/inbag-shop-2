<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
 
class GoogleLoginController extends Controller{

public function redirect()
{
    return Socialite::driver('google')->redirect();
}

public function callback()
    {
        try {
  
            $user = Socialite::driver('google')->user();
            $finduser = User::where('provider_id', $user->id)->first();
   
            if($finduser){
   
                Auth::login($finduser);
                return redirect()->route('home.index');
   
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'provider' => 'google',
                    'provider_id' => $user->id
                ]);

                Auth::login($newUser);
   
                return redirect()->back();
            }
  
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }
 

/*
public function callback($provider)
{
           
    $getInfo = Socialite::driver($provider)->stateless()->user();
     
    $user = $this->createUser($getInfo,$provider);
    //dd($provider);
    auth()->login($user);
 
    return redirect()->route('home.index');
 
}

function createUser($getInfo,$provider){
 
 $user = User::where('provider_id', $getInfo->id)->first();
 
 if (!$user) {
     $user = User::create([
        'name'     => $getInfo->name,
        'email'    => $getInfo->email,
        'provider' => $provider,
        'provider_id' => $getInfo->id
    ]);
  }
  return $user;
}*/
}