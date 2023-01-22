<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Auth_User;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $NAME
 * @property string $email
 * @property string $password
 * @property int $admin
 * @property int $countFailure
 * @property int $countRegistration
 * @property string|null $lastRegistration
 * @property string|null $lastFailure
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountFailure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastFailure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @mixin \Eloquent
 */
class User extends Auth_User
{
    use HasFactory;
    public $timestamps = false;
}
