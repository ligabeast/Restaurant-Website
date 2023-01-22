<?php

namespace App\Http\Controllers;

use App\Http\Controller;
use App\Models\Benutzer;
use App\Models\Bewertung;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AnmeldungController extends Controller
{
    /**
     * Registartion wird durchgeführt
     * @param Request $rd
     */
    public function register_validate(Request $rd)
    {
        $name = $rd->input('name',NULL);
        $email = $rd->input('email',NULL);
        $passwort = Hash::make($rd->input('password',NULL));

        if($name && $email && $passwort){
            $benutzer = new Benutzer();
            $benutzer->attributes['name'] = $name;
            $benutzer->attributes['email'] = $email;
            $benutzer->attributes['passwort'] = $passwort;
            $benutzer->save();
            return redirect()->route('hauptseite', array('message' => 'Ihre Registrierung war erfolgreich'));
        }
        return abort(404);
    }

    public function sign_in_validate(Request $rd){

        $email = $rd->input('email',NULL);
        $passwort = $rd->input('password',NULL);

        if($email && $passwort){
            //password is beein automaticlly hashed by attempt function
            if(Auth::attempt(array('email' => $email, 'password' => $passwort))){
                DB::beginTransaction();

                DB::select(DB::raw("CALL incrementAnmeldung('$email');"));
                Benutzer::whereEmail($email)->update(array('letzteanmeldung' => Carbon::now()));
                Benutzer::whereEmail($email)->update(array('anzahlfehler' => 0));

                DB::commit();

                return redirect()->route('hauptseite');
            }
        }
        DB::beginTransaction();

        Benutzer::whereEmail($email)->update(array('letzterfehler' => Carbon::now()));
        Benutzer::whereEmail($email)->increment('anzahlfehler', 1);

        DB::commit();

        return redirect()->route('hauptseite');
    }

    public function sign_out(Request $rd){
        Auth::logout();

        return redirect()->route('hauptseite');
    }

    public function my_account(Request $rd){

        return view('myaccount', ['bewertungen' => Bewertung::whereBenutzer_id(Auth::id())->get()]);
    }
}
