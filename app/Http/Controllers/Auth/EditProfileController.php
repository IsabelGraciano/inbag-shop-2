<?php
/* Camila Barona */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class EditProfileController extends Controller
{   
    public function edit()
    {
        $data = []; //to be sent to the view
        $customer_id= Auth::user()->id;
        
        try{
            $user = User::findOrFail($customer_id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $item_aux = json_decode($user,true);
        //dd ($item_aux);
        $data["user"] = $item_aux;
        return view('auth.register')->with("data",$data);
    }

    public function update(Request $request, $language){

        $customer_id = Auth::user()->id;  
        $user = User::findOrFail($customer_id);    
        $user->setName($request->input('name'));
        $user->setLastName($request->input('lastName'));
        $user->setEmail($request->input('email'));
        $user->setPhone($request->input('phone'));
        $user->setCountry($request->input('country'));
        $user->setCity($request->input('city'));
        $user->setState($request->input('state'));
        $user->setNeighborhood($request->input('neighborhood'));
        $user->setAdress($request->input('adress'));
        $user->setAdressDetails($request->input('adressDetails'));
        $user->save();
        return redirect()->route('home', ['language' => $language]);
    
}
}