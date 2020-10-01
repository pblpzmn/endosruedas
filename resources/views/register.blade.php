@extends('layouts.messages')

@section('title')
@parent
Bicicletas y Motocicletas 
@stop
@section('content')

<div class="container">
			<h2>
		  Registro
		  
		</h2>
			{!! Form::open(array('url' => 'register' ,'class' => 'form-horizontal' )) !!}
			  <div class="form-group">
			    {!! Form::label('nombre', '', array('class' => 'col-sm-2 control-label')); !!}
			    <div class="col-sm-6">
			      {!! Form::text('name' , '', array('class' => 'form-control','placeholder'=>'Nombre' )) !!}
			    </div>
			  </div>
			  <div class="form-group">
			    {!! Form::label('email', 'Correo',array('class' => 'col-sm-2 control-label')); !!}
			    <div class="col-sm-6">
			      {!! Form::text('email','', array('class' => 'form-control', 'placeholder'=>'Correo' )); !!}
			    </div>
			  </div>
			  <div class="form-group">
			    {!! Form::label('password', 'Clave', array('class' => 'col-sm-2 control-label')); !!}
			    <div class="col-sm-6">
			    	{!! Form::password('password', array('class' => 'form-control', 'placeholder'=>'Clave')); !!}  
			    </div>
			  </div>
			  <div class="form-group">
			  	{!! Form::label('password_confirmation','Repetir Clave', array('class' => 'col-sm-2 control-label')); !!}
				<div class="col-sm-6">
				  	{!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=>'Clave')); !!}  
				</div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">Registrar</button>
			    </div>
			  </div>
			  {!! Form::close() !!}
	 
</div>
@stop