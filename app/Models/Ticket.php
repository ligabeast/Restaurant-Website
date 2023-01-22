<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property string $category
 * @property string $state
 * @property string $specifikation
 * @property string $description
 * @property string $email
 * @property string|null $created_at
 * @property int|null $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSpecifikation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCategory($value)
 */
class Ticket extends Model
{
    use HasFactory;
    public $timestamps = false;
}
