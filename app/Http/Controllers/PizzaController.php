<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Models\Ingredient;
class PizzaController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::withTrashed()->with('ingredient')->get();
        //$ingredients = Ingredient::all();
        return view('pizzas.index', compact('pizzas'));
    }

    /**
     * Formularz dodawania kategorii
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients=Ingredient::all();
        return view('pizzas.form',compact('ingredients'));

    }

    /**
     * Dodanie kategorii

     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // walidacja danych przychodzących z formularza w kontrolerze
        $validatedData = $request->validate([
            'NazwaPizza' => [
                'required',
                'max:50'
            ],
            'CenaBazowa' => [
                'required',
                'gte:0.0'
            ]
        ]);
        // stworzenie obiektu kategorii
        $pizza = new Pizza([
            'NazwaPizza' => $request->input('NazwaPizza'),
            'CenaBazowa' => $request->input('CenaBazowa'),
            'Nazwa' => $request->input('Nazwa')
        ]);
        // zapisanie w bazie danych
        try {
            $pizza->save();
            // przekierowanie na stronę z informacją o kategoriach
            return redirect()->route('pizzas.index')
                ->with('success', __('translation.pizzas.create.messages.success'));
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('pizzas.index')
                        ->with('error', __('translation.pizzas.create.messages.duplicate_entry'));
                    break;
                default:
                    return redirect()->route('pizzas.index')
                        ->with('error', __('translation.pizzas.create.messages.error'));
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
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.show', compact('pizza'));
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
        $pizza = Pizza::findOrFail($id);
        $ingredients = Ingredient::all();
        $edit = true;

        return view('pizzas.form', compact('pizza', 'ingredients' ,'edit'));
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
            'NazwaPizza'=> [
                'required',
                'max:50'
            ],
            'CenaBazowa'=> [
                'required',
                'gte:0.01'
            ]
        ]);
        try {
            // pobranie aktualnej kategorii z bazy
            $pizza = Pizza::findOrFail($id);
            // aktualizacja w bazie danych
            $pizza->NazwaPizza = $request->input('NazwaPizza');
            $pizza->CenaBazowa = $request->input('CenaBazowa');
            $pizza->IdSkladniki= $request->input('IdSkladniki');
            $pizza->save();
            
            // przekierowanie na stronę z informacją o kategoriach
            return redirect()->route('pizzas.index')
                ->with('success', __('translation.pizzas.edit.messages.success'));
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('pizzas.index')
                        ->with('error', __('translation.pizzas.edit.messages.duplicate_entry'));
                    break;
                default:
                    return redirect()->route('pizzas.index')
                        ->with('error', __('translation.pizzas.edit.messages.error'));
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
        $pizza = Pizza::findOrFail($id);

        // usunięcie kategorii
        $pizza->delete();

        return redirect()->route('pizzas.index')
            ->with('success', __('translation.pizzas.destroy.messages.success'));
    }
}
