<?php
namespace App\Http\Controllers;
use App\Models\Generos;
use App\Models\Libro;
use Illuminate\Http\Request;



class LibroController extends Controller
{
    //
    protected $librosValidationRules = [
        'titulo' => 'required|min:2',
        'autor' => 'required|min:2',
        'editorial' => 'required|min:2',
        'lanzamiento' => 'required',
        'genero_id'    => 'required|numeric',
        'precio' => 'required|numeric',
        'sinopsis' => 'required|min:10',

    ];

    protected $librosValidationMessages = [
        'titulo.required'       => 'El libro debe contener un titulo.',
        'titulo.min'            => 'El titulo debe contener al menos :min caracteres.',
        'autor.required'        => 'El libro debe contener el nombre de autor.',
        'autor.min'             => 'El nombre de autor debe contener al menos :min caracteres.',
        'editorial.required'    => 'Ingrese la editorial del libro.',
        'editorial.min'         => 'El nombre de la editorial del libro debe contener al menos :min caracteres.',
        'lanzamiento.required'  => 'Ingrese la fecha de publicación del libro.',
        'precio.required'       => 'Ingrese el precio del libro.',
        'sinopsis.required'     => 'El libro debe contener una sinopsis.',
        'sinopsis.min'          => 'La sinopsis debe contener al menos :min caracteres.',
        'genero_id.required'    => 'Se necesita elegir un género literario'


    ];



    public function libros()
    {   
        $libros = Libro::all();
        $libros = Libro::search(request('search'))->get();

        return view('libros.libros',  compact('libros'));
        
    }

 
   
    public function listado()
    {
        $libros = Libro::with(['generos'])->get();

        return view('admin.libros.listado-libros' , [
            'libros' => $libros,
        ]);
    }

    public function formNew()
    {
        return view('admin.libros.form-new' , [
            'generos' => Generos::all(),
        ]);
    }

    public function processNew(Request $request)
    {
        $data = $request->except(keys: '_token');
        $request->validate($this->librosValidationRules, $this->librosValidationMessages);

        if($request->hasFile('portada')){
            $data['portada'] = $this->uploadPortada($request);
        }
        
        Libro::create($data);

        return redirect()->route('listado-libros')
        ->with('message.success' , 'El libro' . $data['titulo'] . ' se publicó correctamente.');

    }


    public function view($id) 
    {

        $libros = Libro::findOrFail($id);

        return view('libros.view',[
            'libros' => $libros

        ]);

    }

    public function confirmDelete( int $id)
    {   $libros = Libro::findOrFail($id);

        return view('admin.libros.confirm-delete' , [
            'libros' => $libros
        ]);
    }

    public function processDelete(int $id)
    {
        $libros = Libro::findOrFail($id);
        $libros->delete();
        $oldPortada = $libros->portada;

        if($oldPortada && file_exists(public_path('imgs/' . $oldPortada))){
            unlink(public_path('imgs/' . $oldPortada));
        }
        return redirect()->route('listado-libros')
        ->with('message.success' , 'El libro ' . $libros['titulo'] . ' se eliminó correctamente.');
    }

    public function formUpdate($id)
    {   $libros = Libro::findOrFail($id);

        return view('admin.libros.form-update' , [
            'libros' => $libros,
            'generos' => Generos::all(),
        ]);
    }

    public function processUpdate(Request $request , int $id)
    {
        $libros = Libro::findOrFail($id);
        $request->validate($this->librosValidationRules, $this->librosValidationMessages);
        $data = $request->except(keys: '_token');



        $oldPortada = $libros->portada;

        if($request->hasFile('portada')){ 
             $data['portada'] = $this->uploadPortada($request);
        } else {
            unset($data['portada']);
        }

        $libros->update($data);

        if($request->hasFile('portada') && file_exists(public_path('imgs/' . $oldPortada))){
            unlink(public_path('imgs/' . $oldPortada));
        } 

        return redirect()->route('listado-libros')
        ->with('message.success' , 'El libro '. $data['titulo'] . ' se actualizó correctamente.');

    }

    protected function uploadPortada(Request $request) :string
    {
        $portada = $request->file('portada');
        $titulo = $request->input('titulo');
        $portadaName = date('YmdHis_') . \Str::slug($titulo) . "." . $portada->guessExtension();
        $portada->move(public_path('imgs') , $portadaName);
        
        return $portadaName;

    }


}
