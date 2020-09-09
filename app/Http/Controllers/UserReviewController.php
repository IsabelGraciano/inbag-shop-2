<?php
/* Camila Barona */

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Review;



class UserReviewController extends Controller
{

    /* This method shows the information of one product in specific */
    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create review";
        $data["reviews"] = Review::all();
        return view('review.userCreate')->with("data", $data);
    }

    public function save(Request $request)
    {

        $data = [];
        $data["title"] = "Thanks for sharing us your opinion";

        /** Validate the form calling the method validate in the model */
        Review::validate($request);

        Review::create($request->only([
            "description",
            "ranking",
        ]));

        return back()->with('success', 'Thanks for give us your opinion!');
    }

    public function list()
    {
        $data = [];
        $data["title"] = "List reviews";
        $review = Review::all();
        $data["review"] = $review;
        return view('review.userList')->with("data", $data);
    }

    /*public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);
        $data["title"] = $product->getName();
        $data["reviews"] = $product->reviews;
        return view('review.userShow')->with("data", $data);
    }*/

    public function delete($id)
    {
        $data = []; //to be sent to the view
        $review = Review::findOrFail($id);

        $review->delete();
        return redirect()->route('review.userList');
    }

    public function edit($id)
    {
        $review = Review::where('id',  '=', $id)->first();
        return view('review.userShow', compact('review'));
    }

    public function update(Request $request, $id)
    { 
            $review = Review::where('id',  '=', $id)->first();

            $review->update($request->all());
        /** Validate the form calling the method validate in the model */
    
        return redirect()->route('review.userShow');
    }
}
