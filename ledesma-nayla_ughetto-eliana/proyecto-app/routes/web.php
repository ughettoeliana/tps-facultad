<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);

Route::get('libros', [\App\Http\Controllers\LibroController::class, 'libros']);




/* Acciones del admin 1 */

Route::get('listado', [\App\Http\Controllers\LibroController::class, 'listado'])->name('listado-libros')
->middleware('auth');

Route::get('publicar', [\App\Http\Controllers\LibroController::class, 'formNew'])->name('libros-formNew')
->middleware('auth');

Route::post('publicar', [\App\Http\Controllers\LibroController::class, 'processNew'])
->name('libros-processNew')
->middleware('auth');

Route::get('admin/libros-editar/{id}/editar', [\App\Http\Controllers\LibroController::class, 'formUpdate'])
->name('libros-form-edit')
->middleware('auth')
->whereNumber(parameters: 'id');

Route::post('libros-editar/{id}/editar', [\App\Http\Controllers\LibroController::class, 'processUpdate'])
->name('libros-process-edit')
->middleware('auth')
->whereNumber(parameters: 'id');

/* Acciones del admin blog  */
Route::get('blog', [\App\Http\Controllers\PostController::class, 'blog'])->name('blog');

Route::get('post', [\App\Http\Controllers\PostController::class, 'listadoPost'])->name('listado-post')
->middleware('auth');

Route::get('post-detalle/{id}', [\App\Http\Controllers\PostController::class, 'viewPost'])
->name('post-detalle')
->whereNumber(parameters: 'id');


Route::get('publicar-post', [\App\Http\Controllers\PostController::class, 'formNew'])->name('post-formNew')
->middleware('auth');

Route::post('publicar-post', [\App\Http\Controllers\PostController::class, 'processNew'])
->name('post-processNew')
->middleware('auth');

Route::get('post-editar/{id}/editar', [\App\Http\Controllers\PostController::class, 'formUpdate'])
->name('post-form-edit')
->middleware('auth')
->whereNumber(parameters: 'id');

Route::post('post-editar/{id}/editar', [\App\Http\Controllers\PostController::class, 'processUpdate'])
->name('post-process-edit')
->middleware('auth')
->whereNumber(parameters: 'id');

Route::get('post-delete/{id}/eliminar', [\App\Http\Controllers\PostController::class, 'confirmDelete'])
->name('post-confirm-delete')
->middleware('auth')
->whereNumber(parameters: 'id');

Route::post('post-delete/{id}/eliminar', [\App\Http\Controllers\PostController::class, 'processDelete'])
->name('post-process-eliminar')
->middleware('auth')
->whereNumber(parameters: 'id');




/* Vista para el usuario */

Route::get('libros-detalle/{id}', [\App\Http\Controllers\LibroController::class, 'view'])
->name('libro-detalle')
->whereNumber(parameters: 'id');


/* Acciones del admin 2 */

Route::get('libros-delete/{id}/eliminar', [\App\Http\Controllers\LibroController::class, 'confirmDelete'])
->name('confirm-delete')
->middleware('auth')
->whereNumber(parameters: 'id');

Route::post('libros-delete/{id}/eliminar', [\App\Http\Controllers\LibroController::class, 'processDelete'])
->name('process-eliminar')
->middleware('auth')
->whereNumber(parameters: 'id');

Route::get('admin', [\App\Http\Controllers\AuthController::class, 'home'])
->name('admin.index')
->middleware('auth');

/* Iniciar sesión */

Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'formLogin'])->name('auth.form-login');
Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'processLogin'])->name('auth.process-login');

Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

