<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth_User;

/**
 * App\Models\Benutzer
 *
 * @property int $id
 * @property string $NAMEAuthentication
 * @property string $passwort
 * @property int $admin
 * @property int $anzahlfehler
 * @property int $anzahlanmeldungen
 * @property string|null $letzteanmeldung
 * @property string|null $letzterfehler
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer whereAnzahlanmeldungen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer whereAnzahlfehler($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer whereLetzteanmeldung($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer whereLetzterfehler($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer whereNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Benutzer wherePasswort($value)
 * @mixin \Eloquent
 * @property string $NAME
 * @property string $email
 */
class Benutzer extends Auth_User
{
    use HasFactory;
    protected $table = "benutzer";
    public $timestamps = false;

    //nur für default Werte daher unnötig, da DB diese Aufgabe übernimmt
    public $attributes =[
        'id' => NULL,
        'name' => NULL,
        'email' => NULL,
        'passwort' => NULL,
        'admin' => false,
        'anzahlfehler' => 0,
        'anzahlanmeldungen' => 0,
        'letzteanmeldung' => NULL,
        'letzterfehler' => NULL
    ];

    public function getAuthPassword()
    {
        return $this->attributes['passwort'];
    }
}
