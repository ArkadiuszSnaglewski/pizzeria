<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\IngredientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
    /**
     * Routing dla podstawowych operacji CRUD
     *
     * GET/categories, mapped to the index() method,
     * GET /categories/create, mapped to the create() method,
     * POST /categories, mapped to the store() method,
     * GET /categories/{id}, mapped to the show() method,
     * GET /categories/{id}/edit, mapped to the edit() method,
     * PUT/PATCH /categories/{id}, mapped to the update() method,
     * DELETE /categories/{id}, mapped to the destroy() method.
     */
    
     Route::resource('clients', ClientController::class);
     Route::resource('ingredients', IngredientController::class);
     //Route::resource('orders', OrderController::class);
     Route::resource('pizzas', PizzaController::class);
     Route::resource('ingredientspizzas', Ingredient_PizzaController::class);
/*
     Route::name('pizzas.')->prefix('pizzas')->group(function(){
        Route::get('',[PizzaController::class,'index'])
            ->name('index');
        Route::get('',[PizzaController::class,'create'])
            ->name('create');
        Route::post('',[PizzaController::class,'store'])
            ->name('store');
        Route::get('{pizza}', [PizzaController::class, 'show'])
            ->name('show')
            ->where('pizza', '[0-9]+');
        Route::get('{id}/edit', [PizzaController::class, 'edit'])
            ->name('edit')
            ->where('id', '[0-9]+');
        Route::patch('{id}', [PizzaController::class, 'update'])
           ->name('update')
            ->where('id', '[0-9]+');
        Route::delete('{id}', [PizzaController::class, 'destroy'])
            ->name('destroy')
            ->where('id', '[0-9]+');
        });
        */
        

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
