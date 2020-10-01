@extends('layouts.messages')

@section('title')
@parent
Bicicletas y Motocicletas 
@stop

@section('content')

<div class="container">
		<h2>
		  Perfil
		</h2>
			{!! Form::open(array('url' => 'perfil' ,'class' => 'form-horizontal', 'id'=>'profile' )) !!}
			  <div class="form-group">
			    {!! Form::label('name', 'Nombre', array('class' => 'col-sm-2 control-label')); !!}
			    <div class="col-sm-4">
			      {!! Form::text('name' , Auth::user()->name, array('class' => 'form-control','placeholder'=>'Nombre' )) !!}
			    </div>
			    {!! Form::label('email', 'Correo',array('class' => 'col-sm-2 control-label')); !!}
			    <div class="col-sm-4">
			      {!! Form::text('email',Auth::user()->email, array('class' => 'form-control', 'placeholder'=>'Correo', 'disabled'=>'true' )); !!}
			    </div>
			  </div>
			  <div class="form-group">
			    {!! Form::label('', 'Tus teléfonos serán publicados para que puedan contactarte:',  array('class' => 'col-sm-12 ')); !!}
			  </div>
			  <div class="form-group">
			    {!! Form::label('phone', 'Número de teléfono',  array('class' => 'col-sm-2 control-label')); !!}
			    <div class="col-sm-4">
			      {!! Form::text('phone' , Auth::user()->phone , array('class' => 'form-control','placeholder'=>'Teléfono' )) !!}
			    </div>
			    {!! Form::label('cell_phone', 'Celular', array('class' => 'col-sm-2 control-label')); !!}
			    <div class="col-sm-4">
			      {!! Form::text('cell_phone' , Auth::user()->cell_phone, array('class' => 'form-control','placeholder'=>'Celular' )) !!}
			    </div>
			  </div>
			  
			  <div class="form-group">
				    {!! Form::label('password', 'Cambiar password', array('class' => 'col-sm-2 control-label')); !!}
				    <div class="col-sm-1">
				    	{!! Form::checkbox('change_password', 'cambiar',false, array('id'=>'change_password') );!!}
				  	</div>
			  </div>
			  <div class="form-group" id="passwordGroup">
				    {!! Form::label('password', 'Nueva Clave', array('class' => 'col-sm-2 control-label')); !!}
				    <div class="col-sm-4">
				    	{!! Form::password('password', array('class' => 'form-control', 'placeholder'=>'Clave')); !!}  
				    </div>
				    {!! Form::label('password_confirmation','Repetir Clave', array('class' => 'col-sm-2 control-label')); !!}
				    <div class="col-sm-4">
				    	{!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=>'Clave')); !!}  
				    </div>
				  </div>
			  
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default">Actualizar</button>
			    </div>
			  </div>
			  {!! Form::close() !!}
	 
</div>
<script type="text/javascript">
$('#change_password').change(function() {
    if($(this).is(":checked")) {
    	$('#passwordGroup').show();
    }else{
    	$('#passwordGroup').hide();
    }
            
});
$('#passwordGroup').hide();


</script>
@stop
