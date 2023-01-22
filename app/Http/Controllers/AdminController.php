<?php

namespace App\Http\Controllers;

use App\Http\Controller;
use App\Models\User;
use App\Models\Rating;
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
        if(User::whereId(Auth::id())->first()->admin){
            return view('adminpanel', ['bewertungen' => Rating::all(),
                                            'benutzer' => User::all(),
                                            'tickets' => Ticket::all()]);
        }
        return abort(403);
    }
    public function ratings_save(Request $rd){
        if(User::whereId(Auth::id())->first()->admin){
            DB::beginTransaction();
            Rating::query()->update(['highlighted' => 0]);
            for($x = 1; $x <= Rating::all()->count(); $x++){
                if($rd->$x){
                    Rating::whereId($rd->$x)->update(['highlighted' => 1]);
                }
            }
            DB::commit();
            return redirect()->route('admin');
        }
        return abort(403);
    }

    public function change_admin(Request $rd){
        if(User::whereId(Auth::id())->first()->admin){
            DB::beginTransaction();
            User::query()->update(['admin' => 0]);
            for($x = 1; $x <= User::all()->count(); $x++){
                if($rd->$x){
                    User::whereId($rd->$x)->update(['admin' => 1]);
                }
            }
            DB::commit();
            return redirect()->route('admin');
        }
        return abort(403);
    }

    public function change_status(Request $rd){
        if(User::whereId(Auth::id())->first()->admin){
            DB::beginTransaction();
            $id = Ticket::all()->pluck('id')->toArray();
            foreach($id as $d){
                $tmp = 'status_'.$d;
                if($rd->$tmp){
                    Ticket::whereId($d)->update(['state' => $rd->$tmp]);
                }
            }
            DB::commit();
            return redirect('adminbereich#Ticket');
        }
        return abort(403);
    }
}
