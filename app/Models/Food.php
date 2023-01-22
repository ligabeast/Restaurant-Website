<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rating
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $vegetarian
 * @property bool $vegan
 * @property double $price_intern
 * @property double $price_extern
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating wherePriceIntern($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating wherePriceExtern($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereVegetarian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereVegan($value)
 * @mixin \Eloquent
 */
class Food extends Model
{
    use HasFactory;
    protected $table = 'Foods';
}
