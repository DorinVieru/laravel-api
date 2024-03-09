<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::orderByDesc('id')->get();

        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // ARRAY PER ASSEGANRE I COLORI AL BADGE NELLA CREAZIONE
        $badge_color = [
            ['name' => 'Arancione', 'badge_class' => 'arancione'],
            ['name' => 'Nero', 'badge_class' => 'nero'],
            ['name' => 'Azzurro', 'badge_class' => 'azzurro'],
            ['name' => 'Grigio', 'badge_class' => 'grigio'],
            ['name' => 'Rosa', 'badge_class' => 'rosa'],
            ['name' => 'Blu', 'badge_class' => 'html_badge_blue'],
            ['name' => 'Rosso', 'badge_class' => 'css_badge_red'],
            ['name' => 'Giallo', 'badge_class' => 'javascriptl_badge_yellow'],
            ['name' => 'Verde', 'badge_class' => 'vuejs_badge_green'],
            ['name' => 'Viola', 'badge_class' => 'php_badge_violet'],
            ['name' => 'Marrone', 'badge_class' => 'laravel_badge_brown'],
            ['name' => 'Color Mattone', 'badge_class' => 'phyton_badge_orange'],
        ];

        // Genero una condizione per mostrarmi nell'edit e nel create un messaggio di errore personalizzato per la duplicazione di un titolo
        $error_message = '';
        if (!empty($request->all())) {
            $messages = $request->all();
            $error_message = $messages['error_message'];
        }

        return view('admin.technologies.create', compact('badge_color', 'error_message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechnologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechnologyRequest $request, Technology $technology)
    {
        $form_projects = $request->all();

        // QUERY PER IL CONTROLLO NELLA DUPLICAZIONE DEL BADGE
        $exists_badge = Technology::where('badge_class', 'LIKE', $form_projects['badge_class'])->where('id', '!=', $technology->id)->get();
        if (count($exists_badge) > 0) {
            $error_message = 'Hai inserito un badge di una tecnologia di progetto già presente nel database.';
            return redirect()->route('admin.technologies.create', compact('technology', 'error_message'));
        }

        // Creare una query per la modifica di una tecnologia di progetto con lo stesso nome
        $exists = Technology::where('name', 'LIKE', $form_projects['name'])->where('id', '!=', $technology->id)->get();
        // Condizione che mi permette di modificare una tecnologia di progetto mantenendo lo stesso nome. Ma se cambio nome e ne inserisco uno già presente in un altro progetto, mi mostra l'errore impostato.
        if (count($exists) > 0) {
            $error_message = 'Hai inserito un nome di una tecnologia di progetto già presente nel database.';
            return redirect()->route('admin.technologies.create', compact('technology', 'error_message'));
        }

        // CREO LA NUOVA ISTANZA PER TECHNOLOGY PER SALVARLO NEL DATABASE
        $technology = new Technology();

        // LO SLUG LO RECUPERO IN UN SECONDO MOMENTO, IN QUANTO NON LO PASSO NEL FORM
        $form_projects['slug'] = Str::slug($form_projects['name'], '-');
        // RECUPERO I DATI TRAMITE IL FILL
        $technology->fill($form_projects);

        // SALVO I DATI
        $technology->save();

        // FACCIO IL REDIRECT ALLA PAGINA SHOW 
        return redirect()->route('admin.technologies.show', ['technology' => $technology]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology, Request $request)
    {
        // ARRAY PER ASSEGANRE I COLORI AL BADGE NELLA MODIFICA
        $badge_color = [
            ['name' => 'Arancione', 'badge_class' => 'arancione'],
            ['name' => 'Nero', 'badge_class' => 'nero'],
            ['name' => 'Azzurro', 'badge_class' => 'azzurro'],
            ['name' => 'Grigio', 'badge_class' => 'grigio'],
            ['name' => 'Rosa', 'badge_class' => 'rosa'],
            ['name' => 'Blu', 'badge_class' => 'html_badge_blue'],
            ['name' => 'Rosso', 'badge_class' => 'css_badge_red'],
            ['name' => 'Giallo', 'badge_class' => 'javascriptl_badge_yellow'],
            ['name' => 'Verde', 'badge_class' => 'vuejs_badge_green'],
            ['name' => 'Viola', 'badge_class' => 'php_badge_violet'],
            ['name' => 'Marrone', 'badge_class' => 'laravel_badge_brown'],
            ['name' => 'Color Mattone', 'badge_class' => 'phyton_badge_orange'],
        ];
        
        // Genero una condizione per mostrarmi nell'edit e nel create un messaggio di errore personalizzato per la duplicazione di un titolo
        $error_message = '';
        if (!empty($request->all())) {
            $messages = $request->all();
            $error_message = $messages['error_message'];
        }

        return view('admin.technologies.edit', compact('technology', 'error_message', 'badge_color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechnologyRequest  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $form_projects = $request->all();

        // QUERY PER IL CONTROLLO NELLA DUPLICAZIONE DEL BADGE
        $exists_badge = Technology::where('badge_class', 'LIKE', $form_projects['badge_class'])->where('id', '!=', $technology->id)->get();
        if (count($exists_badge) > 0) {
            $error_message = 'Hai inserito un badge di una tecnologia di progetto già presente nel database.';
            return redirect()->route('admin.technologies.edit', compact('technology', 'error_message'));
        }

        // Creare una query per la modifica di una tecnologia di progetto con lo stesso nome
        $exists = Technology::where('name', 'LIKE', $form_projects['name'])->where('id', '!=', $technology->id)->get();
        // Condizione che mi permette di modificare una tecnologia di progetto mantenendo lo stesso nome. Ma se cambio nome e ne inserisco uno già presente in un altro progetto, mi mostra l'errore impostato.
        if (count($exists) > 0) {
            $error_message = 'Hai inserito un nome di una tecnologia di progetto già presente nel database.';
            return redirect()->route('admin.technologies.edit', compact('technology', 'error_message'));
        }

        // LO SLUG LO RECUPERO IN UN SECONDO MOMENTO, IN QUANTO NON LO PASSO NEL FORM
        $form_projects['slug'] = Str::slug($form_projects['name'], '-');

        // SALVO I DATI
        $technology->update($form_projects);

        // FACCIO IL REDIRECT ALLA PAGINA SHOW 
        return redirect()->route('admin.technologies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index');
    }
}
