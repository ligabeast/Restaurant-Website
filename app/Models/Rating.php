<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Rating
 *
 * @property int $id
 * @property string|null $comment
 * @property int|null $rating
 * @property string|null $created_at
 * @property int $dish_id
 * @property int $user_id
 * @property int|null $highlighted
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereDishId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereHighlighted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereUserId($value)
 * @mixin \Eloquent
 * @property int $food_id
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereFoodId($value)
 */
class Rating extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected function foodId() : Attribute{
        return Attribute::make(
            get: fn($value) => Food::whereId($value)->first()->name,
            set: fn($value) => Food::where('name' , '=',$value)->first()->id
        );
    }
}
