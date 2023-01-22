<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if(Auth::check()) {
            return view('ratingpage', [ 'gerichte' => Food::pluck('name')->toArray(),
                                            'bewertungen' => Rating::orderBy('created_at', 'desc')->get()]);
        }
        return abort(403);
    }

    /**
     * Validate the form of index
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rating_validate(Request $rd)
    {
        if(Auth::check()) {
            if (isset($rd->rating) && isset($rd->bemerkung) && isset($rd->gericht) && strlen($rd->bemerkung) >= 5 && strlen($rd->bemerkung) <= 200) {

                $rating = new Rating();
                $rating->rating = $rd->rating;
                $rating->comment = $rd->bemerkung;
                $rating->food_id = $rd->gericht;
                $rating->user_id = Auth::id();
                $rating->save();

                return redirect()->route('bewertungen');
            }else{
                return abort(400);
            }
        }
        else{
            return redirect()->name('hauptseite');
        }
    }

    public function delete_rating(Request $rd){
        if(Auth::check() && Rating::whereId($rd->id)->first()->user_id == Auth::id()){
            Rating::find($rd->id)->delete();
            return redirect()->route('mein Konto');
        }
        abort(403, );
    }

}
