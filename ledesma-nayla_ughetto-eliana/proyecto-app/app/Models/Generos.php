<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Generos
 *
 * @property int $genero_id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Generos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Generos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Generos query()
 * @method static \Illuminate\Database\Eloquent\Builder|Generos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Generos whereGeneroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Generos whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Generos whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Generos extends Model
{
    use HasFactory;
    protected $table = 'generos';
    protected $primaryKey = 'genero_id';
}
