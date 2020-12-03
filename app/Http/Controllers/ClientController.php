<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::withTrashed()->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Formularz dodawania kategorii
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.form');
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
            'Imie' => [
                'required',
                'max:50'
            ],
            'Nazwisko' => [
                'required',
                'max:50'
            ],
            'NumerTelefonu' => [
                'required',
                'max:50'
            ]
        ]);
        // stworzenie obiektu kategorii
        $client = new Client([
            'Imie' => $request->input('Imie'),
            'Nazwisko' => $request->input('Nazwisko'),
            'NumerTelefonu' => $request->input('NumerTelefonu')
        ]);
        // zapisanie w bazie danych
        try {
            $client->save();
            // przekierowanie na stronę z informacją o kategoriach
            return redirect()->route('clients.index')
                ->with('success', __('translation.clients.create.messages.success'));
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('clients.index')
                        ->with('error', __('translation.clients.create.messages.duplicate_entry'));
                    break;
                default:
                    return redirect()->route('clients.index')
                        ->with('error', __('translation.clients.create.messages.error'));
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
      $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
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
        $client = client::findOrFail($id);
        $edit = true;
        return view('clients.form', compact('client', 'edit'));
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
            'Imie' => [
                'required',
                'max:50'
            ],
            'Nazwisko' => [
                'required',
                'max:50'
            ],
            'NumerTelefonu' => [
                'required',
                'max:50'
            ]
        ]);
        try {
            // pobranie aktualnej kategorii z bazy
            $client = client::findOrFail($id);
            // aktualizacja w bazie danych
            $client->Imie = $request->input('Imie');
            $client->Nazwisko = $request->input('Nazwisko');
            $client->NumerTelefonu = $request->input('NumerTelefonu');
            $client->save();
            
            // przekierowanie na stronę z informacją o kategoriach
            return redirect()->route('clients.index')
                ->with('success', __('translation.clients.edit.messages.success'));
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('clients.index')
                        ->with('error', __('translation.clients.edit.messages.duplicate_entry'));
                    break;
                default:
                    return redirect()->route('clients.index')
                        ->with('error', __('translation.clients.edit.messages.error'));
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
        $client = client::findOrFail($id);

        // usunięcie kategorii
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', __('translation.clients.destroy.messages.success'));
    }
}
