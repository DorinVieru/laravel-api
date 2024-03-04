@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <h1 class="fw-bold">Tutti i Tipi di Progetti</h1>
            <a href="{{ route('admin.types.create') }}" > <button class="btn btn-success ms-5">Aggiungi un nuovo tipo di progetto</button></a>
            
        </div>
        <div class="col-12 mt-5">
            <table class="table table-striped border">
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
                    @foreach ($types as $type)
                        <tr>
                            <td class="fw-bold">{{ $type->id }}</td>
                            <td class="text-capitalize">{{ $type->name }}</td>
                            <td>{{ $type->slug }}</td>
                            <td>{{ count($type->projects) }}</td>
                            <td>
                                <div class="d-flex">
                                    {{-- VIEW BUTTON --}}
                                    <a href="{{ route('admin.types.show', ['type' => $type->id]) }}" class="btn btn-sm square btn-primary" title="Visualizza i progetti per questo tipo"><i class="fas fa-eye"></i></a>
                                    {{-- EDIT BUTTON --}}
                                    <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-sm square btn-warning mx-2"><i class="fas fa-edit"></i></a>
                                    {{-- DELETE BUTTON --}}
                                    {{-- <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler cancellare {{ $type->title }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm square btn-danger"><i class="fas fa-trash"></i></button>
                                    </form> --}}

                                    {{-- MODALE --}}
                                    <button class="btn btn-sm square btn-danger" data-bs-toggle="modal" data-bs-target="#modal_type_delete-{{ $type->id }}"><i class="fas fa-trash"></i></button> 
                                </div>
                            </td>
                        </tr>
                        {{-- POP-UP MODALE --}}
                        @include('admin.types.modal_delete')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
