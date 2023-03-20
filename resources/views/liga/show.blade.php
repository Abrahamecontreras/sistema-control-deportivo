@extends('layouts.app')

@section('template_title')
    {{ $liga->name ?? "{{ __('Show') Liga" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Liga</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ligas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $liga->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Logo:</strong>
                            {{ $liga->logo }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $liga->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $liga->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Temporadas:</strong>
                            {{ $liga->temporadas }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
