<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property string $grund
 * @property string $spifiziert
 * @property string $bemerkung
 * @property string|null $zeitpunkt
 * @property int|null $benutzer_id
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereBemerkung($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereBenutzerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereGrund($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSpifiziert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereZeitpunkt($value)
 * @mixin \Eloquent
 */
class Ticket extends Model
{
    use HasFactory;
    protected $table = "tickets";
    public $timestamps = false;
}
