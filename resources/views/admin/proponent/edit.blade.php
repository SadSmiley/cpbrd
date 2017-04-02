@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($proponent, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin.proponent.update', $proponent->id))) !!}

<div class="form-group">
    {!! Form::label('proponent_name', 'Proponent Name*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('proponent_name', old('proponent_name',$proponent->proponent_name), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
      {!! link_to_route('admin.proponent.index', 'Cancel', $proponent->id, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection