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
use Illuminate\Support\Facades\Validator;


class RegistrationController extends Controller
{
    public function register_validate(Request $rd)
    {
        $input['name'] = $rd->input('name',NULL);
        $input['email'] = $rd->input('email',NULL);
        $input['passwort'] = Hash::make($rd->input('password',NULL));

        if($input['name'] && $input['email'] && $input['passwort']) {

            $rules = array( 'email' => 'unique:users,email',
                            'name' => 'unique:users,name');

            $validator = Validator::make($input, $rules);

            if($validator->fails()){
                return redirect()->route('hauptseite', array(
                    'message' => 'Name oder Email sind bereits vergeben!',
                    'alert_mode' => 'danger'));
            }
            $benutzer = new User();
            $benutzer->NAME = $input['name'];
            $benutzer->email = $input['email'];
            $benutzer->password = $input['passwort'];
            $benutzer->save();
            return redirect()->route('hauptseite', array(
                'message' => 'Sie haben sich erfolgreich registriert!',
                'alert_mode' => 'success'));
        }
        return redirect()->route('hauptseite', array(
            'message' => 'Bitte füllen Sie jedes Feld aus!',
            'alert_mode' => 'warning'));
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

        return redirect()->route('hauptseite', array(
            'message' => 'Passwort oder Email falsch!!',
            'alert_mode' => 'danger'));
    }

    public function sign_out(Request $rd){
        Auth::logout();

        return redirect()->route('hauptseite');
    }

    public function my_account(Request $rd){

        return view('myaccount', ['bewertungen' => Rating::whereUserId(Auth::id())->get()]);
    }
}
