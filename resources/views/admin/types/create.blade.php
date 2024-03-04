@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h1 class="fw-bold">Aggiungi un nuovo tipo di progetto!</h1>  
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
            <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <input type="text" name="name" class="form-control @error ('name') is-invalid @enderror" id="name" placeholder="Nome" required value="{{ old('name') }}">
                    @error ('name')
                        <div class="text-danger fw-semibold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <button type="submit" class="btn btn-primary px-5 fs-4">Crea il tuo Tipo di progetto!</button>
                </div>
            </form>
        </div>
        <div class="col-10 text-center mt-5">
            <a href="/admin/types" > <button class="btn btn-success">Torna indietro</button></a>
        </div>
    </div>
</div>
@endsection
