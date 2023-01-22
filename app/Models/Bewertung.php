<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bewertung
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Bewertung newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bewertung newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bewertung query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bewertung whereId()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $bemerkung
 * @property int|null $sterne_bewertung
 * @property string|null $zeitpunkt
 * @property int $gerichte_id
 * @property int $benutzer_id
 * @property int|null $wird_angezeigt
 * @method static \Illuminate\Database\Eloquent\Builder|Bewertung whereBemerkung($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bewertung whereBenutzerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bewertung whereGerichteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bewertung whereSterneBewertung($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bewertung whereWirdAngezeigt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bewertung whereZeitpunkt($value)
 */
class Bewertung extends Model
{
    use HasFactory;
    protected $table = 'bewertungen';
    public $timestamps = false;

    protected function gerichteid() : Attribute{
        return Attribute::make(
            get: fn($value) => gericht::whereId($value)->first()->name,
            set: fn($value) => gericht::where('name' , '=',$value)->first()->id
        );
    }
}
