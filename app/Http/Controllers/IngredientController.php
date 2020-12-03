<?php

namespace App\Http\Controllers;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::withTrashed()->get();
        return view('ingredients.index', compact('ingredients'));
    }

    /**
     * Formularz dodawania kategorii
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.form');
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
        $ingredient = new Ingredient([
            'Nazwa' => $request->input('Nazwa'),
            'Cena' => $request->input('Cena')
        ]);
        // zapisanie w bazie danych
        try {
            $ingredient->save();
            // przekierowanie na stronę z informacją o kategoriach
            return redirect()->route('ingredients.index')
                ->with('success', __('translation.ingredients.create.messages.success'));
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('ingredients.index')
                        ->with('error', __('translation.ingredients.create.messages.duplicate_entry'));
                    break;
                default:
                    return redirect()->route('ingredients.index')
                        ->with('error', __('translation.ingredients.create.messages.error'));
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
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredients.show', compact('ingredient'));
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
        $ingredient = Ingredient::findOrFail($id);
        $edit = true;
        return view('ingredients.form', compact('ingredient', 'edit'));
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
            $ingredient = Ingredient::findOrFail($id);
            // aktualizacja w bazie danych
            $ingredient->Nazwa = $request->input('Nazwa');
            $ingredient->Cena = $request->input('Cena');
            $ingredient->save();
            
            // przekierowanie na stronę z informacją o kategoriach
            return redirect()->route('ingredients.index')
                ->with('success', __('translation.ingredients.edit.messages.success'));
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('ingredients.index')
                        ->with('error', __('translation.ingredients.edit.messages.duplicate_entry'));
                    break;
                default:
                    return redirect()->route('ingredients.index')
                        ->with('error', __('translation.ingredients.edit.messages.error'));
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
        $ingredient = Ingredient::findOrFail($id);

        // usunięcie kategorii
        $ingredient->delete();

        return redirect()->route('ingredients.index')
            ->with('success', __('translation.ingredients.destroy.messages.success'));
    }
}
