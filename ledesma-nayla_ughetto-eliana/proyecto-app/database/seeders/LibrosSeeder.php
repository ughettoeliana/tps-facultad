<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('libros')->insert([
            [
                'libro_id' => 1,
                'titulo' => 'El gran Gatsby',
                'autor' => 'F. Scott Fitzgerald',
                'editorial' => 'Alianza Editorial',
                'genero_id'  => 5,
                'lanzamiento' => '1925-04-10',
                'precio'    => 2700,
                'sinopsis'  => 'Francis Scott Fitzgerald nos relata en esta cruda e intensa novela la vida de un personaje singular, el enigmático y misterioso Jay, Gatsby, un caballero que reina sobre West Egg, un anfitrión de suntuosas fiestas sin fin, y lo hace a través de un narrador implicado directamente en la historia, Nick Carraway, reciente "viejo amigo" que al final se convierte en el único que siente un verdadero afecto hacia el potentado. Gatsby parece un triunfador, con su imagen espléndida y sus derroches incesantes de dinero, sus continuos excesos y la trivialidad de su devenir, con las dudas que surgen sobre su pasado y su extraño comportamiento; pero a la vez está marcado por el trágico destino de la soledad no buscada, del amor interrumpido que nunca se olvida, y por el que estaría dispuesto a hacer cualquier cosa para recuperarlo. Así, surge el inevitable drama. Un materialismo ordinario e insustancial se proyecta sobre la idea esencial del sueño americano. Son los años de la Prohibición, de los gangsters, los contrabandistas y de la corrupción política.',
                'portada' => null,
                'portada_descripcion' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
