<h1 style="color: green">Ciao Dorin</h1>
<p>
    Hai ricevuto una nuova mail, di seguito i dati: <br>
    Nome: {{ $lead->name }} <br>
    Cognome: {{ $lead->surname }} <br>
    Email: {{ $lead->email }} <br>
    Numero di telefono: {{ $lead->phone }} <br>
    Messaggio: <br>
    {{ $lead->message }} <br>
</p>