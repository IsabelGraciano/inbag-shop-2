<?php
/* Isabel Graciano Vasquez */
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Donation;

class AdminDonationController extends Controller
{
    public function list()
    {
        $data = []; 
        $data["donations"] = Donation::all();

        return view('admin.donation.adminList')->with("data",$data);
    }

    public function view($id)
    {
        $data = []; //to be sent to the view      

        try{
            $donation = Donation::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('admin.donation.adminList');
        }

        $data["donation"] = $donation;               
        return view('admin.donation.adminView')->with("data",$data);
    }
}