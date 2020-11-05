<?php
/* Camila Barona */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Illuminate\Support\Facades\Auth;

class UserReviewController extends Controller
{    
    public function saveReview(Request $request, $language, $id)
    {
        $idC = Auth::user()->id;      
        $review = new Review();
        $review->setCustomerId($idC);
        $review->setProductId($id);
        $review->setDescription($request->input('review'));
        $review->setRanking($request->input('rating'));
        $review->save();
        
        return redirect()->route('product.userView', ['language' => $language, $id]);
    }

    public function deleteReview($language, $id)
    {
        $customer_id = Auth::user()->id;
        Review::where('id', $id)->where('customer_id', $customer_id)->delete();
        return back();
    }
}