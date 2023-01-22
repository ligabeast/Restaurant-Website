<?php

namespace App\Http\Controllers;

use App\Models\Bewertung;
use App\Models\Ticket;
use App\Models\View_gerichte_informationen;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controller;



class HauptseiteController extends Controller
{
    public function index(Request $rd){
        return view('mainpage',[
            'gerichte' => View_gerichte_informationen::all(),
            'bewertungen' => Bewertung::where('wird_angezeigt', '=', '1')->get()
        ]);
    }

    public function create_ticket(Request $rd){
        if(Auth::check()){
            $t = new Ticket();
            $t->grund = $rd->reason;
            $t->spezifiziert = $rd->specification;
            $t->email = $rd->email;
            $t->bemerkung = $rd->comment;
            $t->benutzer_id = Auth::id();
            $t->save();
            return redirect()->route('hauptseite');
        }
        return abort(403);
    }


}
