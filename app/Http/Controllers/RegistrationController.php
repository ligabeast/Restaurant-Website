<?php

namespace App\Http\Controllers;

use App\Http\Controller;
use App\Models\User;
use App\Models\Rating;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RegistrationController extends Controller
{
    public function register_validate(Request $rd)
    {
        $name = $rd->input('name',NULL);
        $email = $rd->input('email',NULL);
        $passwort = Hash::make($rd->input('password',NULL));

        if($name && $email && $passwort){
            $benutzer = new User();
            $benutzer->NAME = $name;
            $benutzer->email = $email;
            $benutzer->password = $passwort;
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

                DB::select(DB::raw("CALL incrementRegistration('$email');"));
                User::whereEmail($email)->update(array('lastRegistration' => Carbon::now()));
                User::whereEmail($email)->update(array('countFailure' => 0));

                DB::commit();

                return redirect()->route('hauptseite');
            }
        }
        DB::beginTransaction();

        User::whereEmail($email)->update(array('lastFailure' => Carbon::now()));
        User::whereEmail($email)->increment('countFailure', 1);

        DB::commit();

        return redirect()->route('hauptseite');
    }

    public function sign_out(Request $rd){
        Auth::logout();

        return redirect()->route('hauptseite');
    }

    public function my_account(Request $rd){

        return view('myaccount', ['bewertungen' => Rating::whereUserId(Auth::id())->get()]);
    }
}
