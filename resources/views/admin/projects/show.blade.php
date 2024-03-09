@extends('layouts.admin')

@section('content')
{{-- MAIN --}}
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                <div class="card my-card" style="width: 44rem;">
                    <img src="{{ $project->cover_image != null ?  asset('/storage/' . $project->cover_image) : asset('/img/another-image.jpg') }}" alt="{{ $project->title }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-capitalize fw-bold color-title">{{ $project->title}}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                        <ul class="list-group list-group-flush">
                            {{-- TIPO DI PROGETTO --}}
                            <li class="list-group-item"><strong>Tipo di progetto:</strong> {{ $project->type != null ? $project->type->name : 'Non assegnato' }}</li>
                            {{-- SLUG --}}
                            <li class="list-group-item"><strong>Slug:</strong> {{ $project->slug }}</li>
                            {{-- TECH --}}
                            <li class="list-group-item"><strong>Techs:</strong> 
                                @forelse ($project->technologies as $tech)
                                    <div class="my_badge d-inline-block mx-1 {{ $tech->badge_class }}">{{ $tech->name }}</div>
                                @empty
                                    Il progetto non ha tecnologie assegnate.
                                @endforelse
                            </li>
                        </ul>
                    <div class="card-body">
                        <a href="{{ $project->cover_image !== null ? asset('/storage/' . $project->cover_image) : asset('/img/another-image.jpg') }}" target="_blank" class="btn btn-success"><i class="fa-solid fa-download"></i> Scarica l'immagine</a>
                        {{-- EDIT BUTTON --}}
                        <a href="{{ route('admin.projects.edit', ['project' => $project['id']]) }}">
                            <button type="button" class="btn btn-warning mx-2"><i class="fas fa-edit"></i> Modifica il progetto</button>
                        </a>
                        {{-- DELETE BUTTON --}}
                        {{-- <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare {{ $project->title }}?')">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Cancella il progetto</button>
                        </form> --}}
                        {{-- MODALE --}}
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_project_delete-{{ $project->id }}"><i class="fas fa-trash"></i> Cancella il progetto</button> 
                    </div>  
                </div>
            </div>
            <div class="col-12 text-center mt-5">
                <a href="/admin/projects" > <button class="btn btn-info ms-5"><i class="fa-solid fa-door-open"></i> Torna indietro</button></a>
            </div>
        </div>
</div>
{{-- POP-UP MODALE --}}
@include('admin.projects.modal_delete')
@endsection
