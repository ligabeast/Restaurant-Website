<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\View_food_information
 *
 * @method static \Illuminate\Database\Eloquent\Builder|View_food_information newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View_food_information newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View_food_information query()
 * @mixin \Eloquent
 */
class View_food_information extends Model
{
    use HasFactory;
    protected $table = 'food_information';
}
