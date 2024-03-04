<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderByDesc('id')->get();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // RECUPERO I TIPI DI PROGETTO PER POTERLI CICLARE NELLA SELECT
        $types = Type::all();

        return view('admin.types.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $form_projects = $request->all();

        // CREO LA NUOVA ISTANZA PER TYPE PER SALVARLO NEL DATABASE
        $type = new Type();

        // LO SLUG LO RECUPERO IN UN SECONDO MOMENTO, IN QUANTO NON LO PASSO NEL FORM
        $form_projects['slug'] = Str::slug($form_projects['name'], '-');
        // RECUPERO I DATI TRAMITE IL FILL
        $type->fill($form_projects);

        // SALVO I DATI
        $type->save();

        // FACCIO IL REDIRECT ALLA PAGINA SHOW 
        return redirect()->route('admin.types.show', ['type' => $type]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type, Request $request)
    {
        // Genero una condizione per mostrarmi nell'edit e nel create un messaggio di errore personalizzato per la duplicazione di un titolo
        $error_message = '';
        if (!empty($request->all())) {
            $messages = $request->all();
            $error_message = $messages['error_message'];
        }

        return view('admin.types.edit', compact('type', 'error_message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $form_projects = $request->all();

        // Creare una query per la modifica di un tipo di progetto con lo stesso nome
        $exists = Type::where('name', 'LIKE', $form_projects['name'])->where('id', '!=', $type->id)->get();
        // Condizione che mi permette di modificare un tipo di progetto mantenendo lo stesso nome. Ma se cambio nome e ne inserisco uno già presente in un altro progetto, mi mostra l'errore impostato.
        if (count($exists) > 0) {
            $error_message = 'Hai inserito un nome di un tipo di progetto già presente in un altro tipo di progetto.';
            return redirect()->route('admin.types.edit', compact('type', 'error_message'));
        }

        // LO SLUG LO RECUPERO IN UN SECONDO MOMENTO, IN QUANTO NON LO PASSO NEL FORM
        $form_projects['slug'] = Str::slug($form_projects['name'], '-');

        // SALVO I DATI
        $type->update($form_projects);

        // FACCIO IL REDIRECT ALLA PAGINA SHOW 
        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index');
    }
}
