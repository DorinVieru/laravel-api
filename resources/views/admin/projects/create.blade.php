@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h1 class="fw-bold">Aggiungi un nuovo progetto!</h1>  
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
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <input type="text" name="title" class="form-control @error ('title') is-invalid @enderror" id="title" placeholder="Titolo" required value="{{ old('title') }}">
                    @error ('title')
                        <div class="text-danger fw-semibold">{{ $message }}</div>
                    @enderror
                </div>
                    <div class="mb-3">
                    <textarea name="description" class="form-control @error ('description') is-invalid @enderror" id="description" rows="5" placeholder="Descrizione" required>{{ old('description') }}</textarea>
                    @error ('description')
                        <div class="text-danger fw-semibold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div id="preview" class="mb-2">
                        <img id="preview-image" class="rounded-3" src="" alt="" width="250">
                    </div>
                    <input type="file" name="cover_image" class="form-control @error ('cover_image') is-invalid @enderror" id="cover_image" placeholder="Immagine di copertina" value="{{ old('cover_image') }}">
                    @error ('cover_image')
                        <div class="text-danger fw-semibold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <select name="type_id" id="type_id" class="form-select @error ('type_id') is-invalid @enderror">
                        <option value="">Seleziona il tipo di progetto</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected($type->id == old('type_id'))>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error ('type_id')
                        <div class="text-danger fw-semibold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="technology_id" class="control-label mb-1">Seleziona la tecnologia utilizzata</label>
                    <div>
                        @foreach ($technologies as $tech)
                            <div class="form-check-inline">
                                <input type="checkbox" name="technologies[]" id="technology{{ $tech->id }}" class="form-check-input" value="{{ $tech->id }}" @checked(is_array(old('technologies')) && in_array($tech->id, old('technologies')))>
                                <label for="" class="form-check-label {{ $tech->badge_class }} my_badge">{{ $tech->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error ('type_id')
                        <div class="text-danger fw-semibold">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center mt-4 mb-5">
                    <button type="submit" class="btn btn-primary px-5 fs-4">Crea il tuo Progetto!</button>
                </div>
            </form>
        </div>
        <div class="col-10 text-center mt-5">
            <a href="/admin/projects" > <button class="btn btn-success">Torna indietro</button></a>
        </div>
    </div>
</div>
@endsection
