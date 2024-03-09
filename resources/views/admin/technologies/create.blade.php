@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h1 class="fw-bold color-title">Aggiungi una nuova tecnologia!</h1>  
        </div>
        <div class="col-10 mt-5">
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif
             {{-- Condizione per l'errore della duplicazione del titolo --}}
             @if ($error_message != '')
                <div class="alert alert-danger">
                    {{ $error_message }}
                </div> 
             @endif
            <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror" id="name" placeholder="Nome" required value="{{ old('name') }}">
                    @error ('name')
                        <div class="text-danger fw-semibold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select name="badge_class" id="badge_class" class="form-select @error ('badge_class') is-invalid @enderror">
                        <option value="">Seleziona il colore del badge</option>
                        @foreach ($badge_color as $badge)
                            <option value="{{ $badge['badge_class'] }}" @selected($badge['badge_class'] == old('badge_class'))>{{ $badge['name'] }}</option>
                        @endforeach
                    </select>
                    @error ('type_id')
                        <div class="text-danger fw-semibold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <button type="submit" class="btn btn-success px-5 fs-4">Crea la tua tecnologia da utilizzare!</button>
                </div>
            </form>
        </div>
        <div class="col-10 text-center mt-5">
            <a href="/admin/technologies" > <button class="btn btn-info">Torna indietro</button></a>
        </div>
    </div>
</div>
@endsection
