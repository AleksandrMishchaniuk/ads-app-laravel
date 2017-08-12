
@php
  $method = $is_create ? 'POST' : 'PUT';
  $route = $is_create ? 'ad.store' : 'ad.update';
  $submit_text = $is_create ? 'Create' : 'Save';
@endphp

{!! Form::model($ad, ['route' => [$route, $ad->getId()], 'method' => $method]) !!}

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('title') }}</small>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('description') }}</small>
    </div>

    <div class="pull-right">
        {!! Form::submit($submit_text, ['class' => 'btn btn-success']) !!}
    </div>

{!! Form::close() !!}
