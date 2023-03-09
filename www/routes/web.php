<?php
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome'); // view padrão
});
*/
 
Route::fallback(function() {
    dd('Rota inexistente');
});

Route::resource('/usuarios', UsersController::class)->middleware(['MyFirstMiddleware']);

/* php artisan route:list --except-vendor */
// MODO ESTENDIDO 
/*

*/
Route::get('/usuarios', [UsersController::class, 'index'])->name('user.index');
Route::get('/users/adicionar', [UsersController::class, 'create'])->name('user.create');
Route::get('/usuario/{id}', [UsersController::class, 'show'])->name('user.show')->where('id', '[0-9+]');
Route::get('/usuarios/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
Route::put('/usuarios/update/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/usuarios/delete/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
Route::post('/usuarios/adicionar', [UsersController::class, 'store'])->name('user.store');

// MODO AGRUPAGO
// Sequencia: prefixo, value, controller e middleware
/*
Route::prefix('usuarios')->name('user.')
    ->controller(UsersController::class)
    // ->middleware('auth') // NESTE CASO PARA VALIDAR O LOGIN DO USUÁRIO
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9+]');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');

        Route::get('/adicionar', 'create')->name('create');
        Route::post('/adicionar', 'store')->name('store');
    });
*/
  