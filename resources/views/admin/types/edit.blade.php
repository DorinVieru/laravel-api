@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h1 class="fw-bold">Modifica il tipo di progetto {{ $type->name }}</h1>  
        </div>
        <div class="col-10 mt-5">
            {{-- Condizione per ciclare gli errori da mostrare --}}
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
             {{-- FORM --}}
            <form action="{{ route('admin.types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="control-label">Nome</label>
                    <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror" id="name" placeholder="Nome" required value="{{ old('name') ?? $type->name }}">
                    @error ('name')
                        <div class="text-danger fw-semibold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <button type="submit" class="btn btn-warning px-5 fs-4">Modifica ora il tipo di progetto</button>
                </div>
            </form>
        </div>
        <div class="col-10 text-center mt-5">
            <a href="/admin/types" > <button class="btn btn-success">Torna indietro</button></a>
        </div>
    </div>
</div>
@endsection
