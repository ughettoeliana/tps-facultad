<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Posts
 *
 * @property int $post_id
 * @property string $titulo
 * @property int $autor
 * @property string|null $imagen
 * @property string|null $imagen_descripcion
 * @property string $descripcion
 * @property string $contenido
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Posts $autores
 * @method static \Illuminate\Database\Eloquent\Builder|Posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts query()
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereAutor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereContenido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereImagenDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Posts whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    protected $fillable = ['categoria_id' , 'usuario_id' , 'post_id' , 'titulo', 'imagen', 'imagen_descripcion', 'descripcion' , 'contenido'];



    /**
     * Summary of autores
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function autores()
    {  

    return $this->belongsTo(Usuario::class , 'usuario_id' , 'usuario_id');
    
    }

    public function categorias()
    {
        return $this->belongsTo(Categoria::class , 'categoria_id' , 'categoria_id');
    }


    
}
