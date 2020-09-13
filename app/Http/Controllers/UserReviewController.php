<?php
/* Camila Barona */

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Review;
use Illuminate\Support\Facades\Auth;



class UserReviewController extends Controller
{    
    public function saveReview(Request $request, $id)
    {
        $idC = Auth::user()->id;
        $review = new Review();
        $review->setCustomerId($idC);
        echo ($review);
        $review->setProductId($id);
        $review->setDescription($request->input('review'));
        $review->setRanking($request->input('rating'));
        $review->save();
        
        return redirect()->route('product.userView', $id);
    }
}