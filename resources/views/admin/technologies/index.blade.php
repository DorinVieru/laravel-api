@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h1 class="fw-bold color-title">Tutte le Tecnologie utilizzate</h1>
            <a href="{{ route('admin.technologies.create') }}"> <button class="btn btn-success ms-5">Aggiungi una nuova tecnologia</button></a>

        </div>
        <div class="col-12 mt-5">
            <table id="table-types-techs" class="table table-striped border">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Slug</th>
                        <th>Numero di progetti</th>
                        <th>TOOLS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                    <tr>
                        <td class="fw-bold">{{ $technology->id }}</td>
                        <td class="text-capitalize">{{ $technology->name }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td>{{ count($technology->projects) }}</td>
                        <td>
                            <div class="d-flex">
                                {{-- VIEW BUTTON --}}
                                <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}" class="btn btn-sm square btn-info" title="Visualizza i progetti per questo tipo"><i class="fas fa-eye"></i></a>
                                {{-- EDIT BUTTON --}}
                                <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" class="btn btn-sm square btn-warning mx-2"><i class="fas fa-edit"></i></a>
                                {{-- DELETE BUTTON --}}
                                {{-- <form action="{{ route('admin.technologies.destroy', ['tech' => $tech->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare {{ $tech->title }}?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm square btn-danger"><i class="fas fa-trash"></i></button>
                                </form> --}}

                                {{-- MODALE --}}
                                <button class="btn btn-sm square btn-danger" data-bs-toggle="modal" data-bs-target="#modal_tech_delete-{{ $technology->id }}"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    {{-- POP-UP MODALE --}}
                    @include('admin.technologies.modal_delete')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection