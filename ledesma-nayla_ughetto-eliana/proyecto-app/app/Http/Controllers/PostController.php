<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Posts;
use App\Models\Usuario;


use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    protected $PostValidationRules = [
        'titulo' => 'required|min:2',
        'descripcion' => 'required|min:5',
        'contenido' => 'required|min:10',

    ];

    protected $PostValidationMessages = [
        'titulo.required'               => 'El post debe contener un titulo.',
        'titulo.min'                    => 'El post debe contener al menos :min caracteres.',
        'descripcion.required'          => 'El post debe contener una breve descripción.',
        'descripcion.min'               => 'El post debe contener al menos :min caracteres.',
        'contenido.required'            => 'El post debe contener texto.',
        'contenido.min'                 => 'El post debe contener al menos :min caracteres.',
    ];
    public function blog(){
        $posts = Posts::with(['autores' , 'categorias'])->get();
        return view('libros.blog' , [
            'posts' => $posts 

        ]);
    }
    public function listadoPost()
    {
        
        $posts = Posts::with(['autores' , 'categorias'])->get(); 
        /* $posts = Posts::all(); */

        return view('admin.blog.listado-posts' , [
            'posts' => $posts 
        ]);
     }

     public function viewPost($id) 
    {
         $posts = Posts::findOrFail($id);

        return view('libros.view-post',[
            'posts' => $posts

        ]);

    }

    public function formNew()
    {
        return view('admin.blog.form-new' , [
            'autores' => Usuario::all(),
            'categorias' => Categoria::all()
        ]);
    }

    public function processNew(Request $request) {

        $data = $request->except(keys: '_token');
        $request->validate($this->PostValidationRules, $this->PostValidationMessages);

        if($request->hasFile('imagen')){
            $data['imagen'] = $this->uploadPortada($request);
        }

        Posts::create([
            'titulo'                => $data['titulo'],
            'descripcion'           => $data['descripcion'],
            'contenido'             => $data['contenido'],
            'categoria_id'          => $data['categoria_id'],
            'imagen'                => $data['imagen'] ?? null,
            'imagen_descripcion'    => $data['imagen_descripcion'],
            'usuario_id'            => 1,
        ]);

        return redirect()->route('listado-post')
        ->with('message.success' , 'El post ' . $data['titulo'] . ' se publicó correctamente.');
    }

    public function formUpdate($id)
    {   $posts = Posts::findOrFail($id);

        return view('admin.blog.form-update' , [
            'posts' => $posts,
           /*  'autores' => Usuario::all(), */
            'categorias'  =>Categoria::all()
        ]);
    }

    public function processUpdate(Request $request , int $id)
    {
        $posts = Posts::findOrFail($id);
        $request->validate($this->PostValidationRules, $this->PostValidationMessages);
        $data = $request->except(keys: '_token');


        $oldImagen = null;

        $oldImagen = $posts->imagen;

        if($request->hasFile('imagen')){ 
             $data['imagen'] = $this->uploadPortada($request);
        } else {
            unset($data['imagen']);
        }

        $posts->update($data);

        if($request->hasFile('imagen') && file_exists(public_path('imgs/' . $oldImagen))){
            unlink(public_path('imgs/' . $oldImagen));
        } 

        return redirect()->route('listado-post')
        ->with('message.success' , 'El post '. $data['titulo'] . ' se actualizó correctamente.');

    }
     public function confirmDelete( int $id)
    {   $posts = Posts::findOrFail($id);

        return view('admin.blog.confirm-delete' , [
            'posts' => $posts
        ]);
    }
    
    public function processDelete(int $id)
    {
        $posts = Posts::findOrFail($id);
        $posts->delete();
        $oldImagen= $posts->imagen; 

        if($oldImagen && file_exists(public_path('imgs/' . $oldImagen))){
            unlink(public_path('imgs/' . $oldImagen));
        } 

        return redirect()->route('listado-post')
        ->with('message.success' , 'El post ' . $posts['titulo'] . ' se eliminó correctamente.');
    }

    protected function uploadPortada(Request $request) :string
    {
        $imagen = $request->file('imagen');
        $titulo = $request->input('titulo');
        $imagenName = date('YmdHis_') . \Str::slug($titulo) . "." . $imagen->guessExtension();
        $imagen->move(public_path('imgs') , $imagenName);
        
        return $imagenName;
    }
}
