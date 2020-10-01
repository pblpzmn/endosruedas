@extends('layouts.messages')

@section('title')
@parent
Bicicletas y Motocicletas 
@stop

@section('content')

 <div class="container">
		<h2>
		  Login
		  
		</h2>
 			{!! Form::open(array('url' => 'login' ,'class' => 'form-horizontal' )) !!}
 			
			<div class="form-group">
			  <div class="col-sm-6">
			  	<label> ¿Aún no te has <a class="" href="{!!server_root()!!}/registro">registrado</a> ?</label>
			      	<span>
				      	<a href="/registro">
				      	ir al Registro!
				      	</a>
			      	</span>
		      </div>
		    </div>
 			
 			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
			    <div class="col-sm-offset-2 col-sm-1">
			      <button type="submit" class="btn btn-default">Inicio</button>
			    </div>
			  </div>
			  
			  {!! Form::close() !!}
			  
			 
</div>
@stop