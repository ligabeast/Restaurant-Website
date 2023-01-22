<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\gericht
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $beschreibung
 * @property string $erfasst_am
 * @property int $vegetarisch
 * @property int $vegan
 * @property float $preis_intern
 * @property float $preis_extern
 * @property string|null $bildname
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht whereBeschreibung($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht whereBildname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht whereErfasstAm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht wherePreisExtern($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht wherePreisIntern($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht whereVegan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gericht whereVegetarisch($value)
 */
class Gericht extends Model
{
    use HasFactory;
    protected $table = 'gerichte';

}
