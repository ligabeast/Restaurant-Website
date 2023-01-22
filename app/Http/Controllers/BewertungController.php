<?php

namespace App\Http\Controllers;

use App\Models\Benutzer;
use App\Models\Bewertung;
use App\Http\Controllers\Controller;
use App\Models\gericht;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BewertungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if(Auth::check()) {
            return view('ratingpage', [ 'gerichte' => gericht::pluck('name')->toArray(),
                                            'bewertungen' => Bewertung::orderBy('zeitpunkt', 'desc')->limit(30)->get()]);
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

                $rating = new Bewertung();
                $rating->sterne_bewertung = $rd->rating;
                $rating->bemerkung = $rd->bemerkung;
                $rating->gerichte_id = $rd->gericht;
                $rating->benutzer_id = Auth::id();
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

    public function myRatings(Request $rd){

        return view('meineBewertungen', ['bewertungen' => Bewertung::orderBy('zeitpunkt','desc')->where('benutzer_id','=',Auth::id())->get()]);

    }

    public function delete_rating(Request $rd){
        if(Auth::check() && Bewertung::all()->where('id','=',$rd->id)->first()->benutzer_id == Auth::id()){
            Bewertung::find($rd->id)->delete();
            return redirect()->route('mein Konto');
        }
        abort(403, );
    }

}
