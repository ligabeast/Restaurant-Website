<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Ticket;
use App\Models\View_food_information;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controller;



class MainController extends Controller
{
    public function index(Request $rd){
        return view('mainpage',[
            'gerichte' => View_food_information::all(),
            'bewertungen' => Rating::whereHighlighted(true)->get(),
            'message' => $rd->message,
            'alert_mode' => $rd->alert_mode
        ]);
    }

    public function create_ticket(Request $rd){
        if(Auth::check()){
            $t = new Ticket();
            $t->reason = $rd->reason;
            $t->specifikation = $rd->specifikation;
            $t->email = $rd->email;
            $t->description = $rd->comment;
            $t->user_id = Auth::id();
            $t->save();
            return redirect()->route('hauptseite');
        }
        return abort(403);
    }


}
