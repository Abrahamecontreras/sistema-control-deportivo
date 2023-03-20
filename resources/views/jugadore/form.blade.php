<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $jugadore->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('equipo_id') }}
            {{ Form::select('equipo_id', $equipos, $jugadore->equipo_id, ['class' => 'form-control' . ($errors->has('equipo_id') ? ' is-invalid' : ''), 'placeholder' => 'Equipo Id']) }}
            {!! $errors->first('equipo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num_playera') }}
            {{ Form::text('num_playera', $jugadore->num_playera, ['class' => 'form-control' . ($errors->has('num_playera') ? ' is-invalid' : ''), 'placeholder' => 'Num Playera']) }}
            {!! $errors->first('num_playera', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('posicion') }}
            {{ Form::text('posicion', $jugadore->posicion, ['class' => 'form-control' . ($errors->has('posicion') ? ' is-invalid' : ''), 'placeholder' => 'Posicion']) }}
            {!! $errors->first('posicion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('foto') }}
            {{ Form::text('foto', $jugadore->foto, ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto']) }}
            {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>