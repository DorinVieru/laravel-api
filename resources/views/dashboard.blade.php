@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('La tua Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Sei loggato, complimenti!') }}
                    <p class="pt-3">Nella tabella <a href="{{ route('admin.projects.index') }}"><strong>Projects</strong></a> puoi visionare tutti i tuoi progetti, aggiungerne di nuovi ed eliminare quelli che non ti servono più! <br> Bello, vero?</p>
                    <p>Nella tabella <a href="{{ route('admin.types.index') }}"><strong>Types</strong></a> puoi visionare tutte le tipologie di progetto.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
