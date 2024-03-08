<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Models\Lead;
use App\Mail\NewContact;

class LeadApiController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'name'  => 'required|max:50|min:2',
            'surname'  => 'required|max:70|min:2',
            'email'  => 'required|max:100|min:5',
            'phone'  => 'required|max:25|min:5',
            'message'  => 'required|min:5',
        ], $errors = [
            'name.required' => 'Il nome è obbligatorio.',
            'name.max' => 'Il nome può contenere massimo 50 caratteri.',
            'name.min' => 'Il nome deve contenere almeno 2 caratteri.',
            'surname.required' => 'Il cognome è obbligatorio.',
            'surname.max' => 'Il cognome può contenere massimo 70 caratteri.',
            'surname.min' => 'Il cognome deve contenere almeno 2 caratteri.',
            'email.required' => 'La email è obbligatoria.',
            'email.max' => 'La email può contenere massimo 100 caratteri.',
            'email.min' => 'La email deve contenere almeno 5 caratteri.',
            'phone.required' => 'Il numero di telefono è obbligatorio.',
            'phone.max' => 'Il numero di telefono può contenere massimo 25 caratteri.',
            'phone.min' => 'Il numero di telefono deve contenere almeno 5 caratteri.',
            'message.required' => 'Il campo per il messaggio è obbligatorio.',
            'message.min' => 'Il campo per il messsagio deve contenere almeno 5 caratteri.',
            
        ]);

        // VERIFICO SE LA VALIDAZIONE FALLISCE
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // SE LA VALIDAZIONE VA A BUON FINE CREO UN NUOVO RECORD NELLA TABELLA LEAD
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        // INVIO LA MAIL
        Mail::to('info@boolfolio.com')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}
