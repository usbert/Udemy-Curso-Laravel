<?php
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Route;

Route::fallback(function() {
    dd('Rota inexistente');
});



Route::resource('/users', UsersController::class)->middleware(['MyFirstMiddleware']);

// REGISTRA UM NOVO USUÁRIO:
Route::get('/registro', [AuthController::class, 'formRegister'])->name('formRegister');

// USUÁRIO SE LOGA:
route::get('/login', [AuthController::class, 'formLogin'])->name('login');
route::post('/login', [AuthController::class, 'login'])->name('post.login');

Route::Post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/post/new-post/{id}', [PostsController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostsController::class, 'store'])->name('post.store');

// MODO AGRUPAGO
// Sequencia: prefixo, value, controller e middleware
Route::middleware('auth')
    ->prefix('usuarios')
    ->controller(UsersController::class)
    ->name('user.')
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/adicionar', 'create')->name('create');
        Route::post('/adicionar', 'store')->name('store')->withoutMiddleware('auth');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9+]');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');

        Route::get('/posts/{id}', 'posts')->name('post');
        Route::get('/endereco/{id}', 'address')->name('address');
        
    });

   
  
    /* php artisan route:list --except-vendor */
    // MODO ESTENDIDO 
    /*
    Route::get('/usuarios', [UsersController::class, 'index'])->name('user.index');
    Route::get('/usuario/{id}', [UsersController::class, 'show'])->name('user.show')->where('id', '[0-9+]');
    Route::get('/usuarios/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
    Route::put('/usuarios/update/{id}', [UsersController::class, 'update'])->name('user.update');
    Route::delete('/usuarios/delete/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
    Route::get('/usuarios/adicionar', [UsersController::class, 'create'])->name('user.create');
    Route::post('/usuarios/store', [UsersController::class, 'store'])->name('user.store');
    */