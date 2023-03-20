@extends('layouts.app')

@section('template_title')
    {{ $jugadore->name ?? "{{ __('Show') Jugadore" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Jugadore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('jugadores.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $jugadore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Equipo Id:</strong>
                            {{ $jugadore->equipo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Num Playera:</strong>
                            {{ $jugadore->num_playera }}
                        </div>
                        <div class="form-group">
                            <strong>Posicion:</strong>
                            {{ $jugadore->posicion }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            {{ $jugadore->foto }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
