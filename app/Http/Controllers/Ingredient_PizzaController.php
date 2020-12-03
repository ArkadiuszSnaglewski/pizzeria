<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ingredient_PizzaController extends Controller
{
     /**
     * Ingredient_Pizza
     * ingredient_pizza
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients_pizzas = Ingredient_Pizza::withTrashed()->get();
        return view('ingredients_pizzas.index', compact('ingredients_pizzas'));
    }

    /**
     * Formularz dodawania kategorii
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients_pizzas.form');
    }

    /**
     * Dodanie kategorii
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // walidacja danych przychodzących z formularza w kontrolerze
        $validatedData = $request->validate([
            'Nazwa' => [
                'required',
                'max:50'
            ],
            'Cena' => [
                'required',
                'gte:0.0'
            ]
        ]);
        // stworzenie obiektu kategorii
        $ingredient_pizza = new Ingredient_Pizza([
            'Nazwa' => $request->input('Nazwa'),
            'Cena' => $request->input('Cena')
        ]);
        // zapisanie w bazie danych
        try {
            $ingredient_pizza->save();
            // przekierowanie na stronę z informacją o kategoriach
            return redirect()->route('ingredients_pizzas.index')
                ->with('success', __('translation.ingredients_pizzas.create.messages.success'));
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('ingredients_pizzas.index')
                        ->with('error', __('translation.ingredients_pizzas.create.messages.duplicate_entry'));
                    break;
                default:
                    return redirect()->route('ingredients_pizzas.index')
                        ->with('error', __('translation.ingredients_pizzas.create.messages.error'));
            }
        }
    }

    /**
     * Wyświetlanie szczegółów wybranej kategorii
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredient_pizza = Ingredient_Pizza::findOrFail($id);
        return view('ingredients_pizzas.show', compact('ingredient_pizza'));
    }

    /**
     * Formularz edycji kategorii
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // findOrFail różni się tym od find, że rzuci błędem 404
        // w przypadku braku rekordu
        $ingredient_pizza = Ingredient_Pizza::findOrFail($id);
        $edit = true;
        return view('ingredients_pizzas.form', compact('ingredient_pizza', 'edit'));
    }

    /**
     * Aktualizacja kategorii
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // walidacja danych przychodzących z formularza w kontrolerze
        $validatedData = $request->validate([
            'Nazwa'=> [
                'required',
                'max:50'
            ],
            'Cena'=> [
                'required',
                'gte:0.01'
            ]
        ]);
        try {
            // pobranie aktualnej kategorii z bazy
            $ingredient_pizza = Ingredient_Pizza::findOrFail($id);
            // aktualizacja w bazie danych
            $ingredient_pizza->Nazwa = $request->input('Nazwa');
            $ingredient_pizza->Cena = $request->input('Cena');
            $ingredient_pizza->save();
            
            // przekierowanie na stronę z informacją o kategoriach
            return redirect()->route('ingredients_pizzas.index')
                ->with('success', __('translation.ingredients_pizzas.edit.messages.success'));
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('ingredients_pizzas.index')
                        ->with('error', __('translation.ingredients_pizzas.edit.messages.duplicate_entry'));
                    break;
                default:
                    return redirect()->route('ingredients_pizzas.index')
                        ->with('error', __('translation.ingredients_pizzas.edit.messages.error'));
            }
        }
    }

    /**
     * Usunięcie kategorii
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //odtworzenie usunięcia
        //Product::withTrashed()->find($id)->restore();
        $ingredient_pizza = Ingredient_Pizza::findOrFail($id);

        // usunięcie kategorii
        $ingredient_pizza->delete();

        return redirect()->route('ingredients_pizzas.index')
            ->with('success', __('translation.ingredients_pizzas.destroy.messages.success'));
    }
}
