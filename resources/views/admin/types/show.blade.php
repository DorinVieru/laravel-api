@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="fw-bold text-capitalize">{{ $type->name }}</h1>
                <p class="fs-6">Slug: {{ $type->slug }}</p>
            </div>
            <div class="col-12 mt-5">
                <div class="row">
                        @forelse ($type->projects as $project)
                        <div class="col-4 mb-3">
                            <div class="card" style="width: 23rem;">
                                <img src="{{ $project->cover_image ? asset('/storage/' . $project->cover_image) : asset('/img/another-image.jpg') }}" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title text-capitalize">{{ $project->title}}</h5>
                                    <p class="card-text">{{ $project->description }}</p>
                                    <a href="{{ $project->cover_image !== null ? asset('/storage/' . $project->cover_image) : asset('/img/another-image.jpg') }}" target="_blank" class="btn btn-primary btn-sm"><i class="fa-solid fa-download"></i> Scarica immagine</a>
                                    <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Vai al progetto</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <h3>Non ci sono progetti per il tipo che stai cercando.</h3>
                        </div>
                        @endforelse
                </div>
            </div>
            <div class="d-flex mt-2 mb-5">
                {{-- EDIT BUTTON --}}
                {{-- <a href="{{ route('admin.types.edit', ['type' => $type['id']]) }}">
                    <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i> Modifica il progetto</button>
                </a> --}}
                {{-- DELETE BUTTON --}}
                {{-- <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare {{ $type->name }}?')">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Cancella il progetto</button>
                </form> --}}

            </div>
            <div class="col-12 text-center mt-1 mb-5">
                {{-- MODALE --}}
                <button class="btn btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#modal_type_delete-{{ $type->id }}"><i class="fas fa-trash"></i> Cancella la tipologia di progetto</button> 
                <a href="/admin/types" > <button class="btn btn-secondary"><i class="fa-solid fa-door-open"></i> Torna indietro</button></a>
            </div>
        </div>
</div>
{{-- POP-UP MODALE --}}
@include('admin.types.modal_delete')
@endsection
