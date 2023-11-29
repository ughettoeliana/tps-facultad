<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;


/**
 * App\Models\Libro
 *
 * @property int $libro_id
 * @property string $titulo
 * @property string $autor
 * @property string $editorial
 * @property string $lanzamiento
 * @property int $precio
 * @property string $sinopsis
 * @property string|null $portada
 * @property string|null $portada_descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Libro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Libro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Libro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Libro whereAutor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Libro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Libro whereEditorial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Libro whereLanzamiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Libro whereLibroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Libro wherePortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Libro wherePortadaDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Libro wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Libro whereSinopsis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Libro whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Libro whereUpdatedAt($value)
 * @property int $genero_id
 * @property-read \App\Models\Generos $genero
 * @method static \Illuminate\Database\Eloquent\Builder|Libro whereGeneroId($value)
 * @property-read \App\Models\Generos $generos
 * @mixin \Eloquent
 */
class Libro extends Model
{
    use HasFactory;
    use Searchable;
    protected $table = 'libros';

    protected $primaryKey = 'libro_id';
    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = ['genero_id' , 'titulo', 'autor', 'editorial', 'lanzamiento', 'precio', 'portada', 'portada_descripcion', 'sinopsis'];

    protected function precio(): Attribute
    {        return Attribute::make(
            get: fn (int $precio)     => $precio / 100,
            set: fn (float $precio)   => $precio * 100,
        );
    }
   
    /**
     * Summary of toSearchableArray
     * @return array<string>
     */
    public function toSearchableArray()
    {
        return [
        'titulo' => $this->titulo,
        'autor' => $this->autor,
        ]; 
    } 

    /**
     * Summary of libro
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function generos() : BelongsTo 
    {   
        return $this->belongsTo(Generos::class , 'genero_id' , 'genero_id');
        
    }

}
