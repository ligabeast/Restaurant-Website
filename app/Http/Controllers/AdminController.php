<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\Benutzer;
use App\Models\Bewertung;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if(Benutzer::whereId(Auth::id())->first()->admin){
            return view('adminpanel', ['bewertungen' => Bewertung::all(),
                                            'benutzer' => Benutzer::all(),
                                            'tickets' => Ticket::all()]);
        }
        return abort(403);
    }
    public function ratings_save(Request $rd){
        if(Benutzer::whereId(Auth::id())->first()->admin){
            DB::beginTransaction();
            Bewertung::query()->update(['wird_angezeigt' => 0]);
            for($x = 1; $x <= Bewertung::all()->count(); $x++){
                if($rd->$x){
                    Bewertung::whereId($rd->$x)->update(['wird_angezeigt' => 1]);
                }
            }
            DB::commit();
            return redirect()->route('admin');
        }
        return abort(403);
    }

    public function change_admin(Request $rd){
        if(Benutzer::whereId(Auth::id())->first()->admin){
            DB::beginTransaction();
            Benutzer::query()->update(['admin' => 0]);
            for($x = 1; $x <= Benutzer::all()->count(); $x++){
                if($rd->$x){
                    Benutzer::whereId($rd->$x)->update(['admin' => 1]);
                }
            }
            DB::commit();
            return redirect()->route('admin');
        }
        return abort(403);
    }

    public function change_status(Request $rd){
        if(Benutzer::whereId(Auth::id())->first()->admin){
            DB::beginTransaction();
            $id = Ticket::all()->pluck('id')->toArray();
            foreach($id as $d){
                $tmp = 'status_'.$d;
                if($rd->$tmp){
                    Ticket::whereId($d)->update(['status' => $rd->$tmp]);
                }
            }
            DB::commit();
            return redirect()->route('admin');
        }
        return abort(403);
    }
}
