@extends('layouts.messages')

@section('title')
@parent
Bicicletas y Motocicletas 
@stop

@section('content')
<div class="container">
	<div class="row">
	  
		 <div class="col-md-12">
			<h2>Contáctanos.</h2>
			<h3>Envíanos tus opiniones y sugerencias.</h3>
		 </div>
		
		 
		 <div class="col-md-12">
			{!! Form::open(array('url' => 'contact_us' ,'class' => 'form-horizontal' ,'files' => true, 'id'=>'validateForm')) !!}
				  <div class="form-group">
					 <div class="col-sm-10">
					 	<div class="form-group">
					  		{!! Form::label('name', 'Nombre', array('class' => 'col-sm-4 control-label')); !!}
						    <div class="col-sm-8">
						      {!! Form::text('name' , '', array('class' => 'form-control','placeholder'=>'Nombre' )) !!}
						    </div>
					    </div>
					    <div class="form-group">
						    {!! Form::label('from', 'Correo Electrónico', array('class' => 'col-sm-4 control-label')); !!}
						    <div class="col-sm-8">
						      {!! Form::text('from' , '', array('class' => 'form-control','placeholder'=>'Correo Electrónico' )) !!}
						    </div>
					    </div>
					    <div class="form-group">
							 {!! Form::label('telephone', 'Teléfono', array('class' => 'col-sm-4 control-label')); !!}
						    <div class="col-sm-8">
						      {!! Form::text('telephone' , '', array('class' => 'form-control','placeholder'=>'Teléfono' )) !!}
						    </div>
					    </div>
					    <div class="form-group">
						    {!! Form::label('city', 'Ciudad (opcional)', array('class' => 'col-sm-4 control-label')); !!}
						    <div class="col-sm-8">
						      {!! Form::text('city' , '', array('class' => 'form-control','placeholder'=>'Ciudad' )) !!}
						    </div>
					    </div>
					    <div class="form-group">
						    {!! Form::label('description', 'Descripción', array('class' => 'col-sm-4 control-label')); !!}
						    <div class="col-sm-8">
						      {!! Form::textarea('description' , '', array('class' => 'form-control','placeholder'=>'', 'rows'=>'4' )) !!}
						    </div>
					    </div>
	 				    <div class="form-group">
						    <div class="col-sm-offset-11 col-sm-1">
						      <button type="submit" class="btn btn-default">Enviar</button>
						    </div>
						</div>
						
					  </div>
				  </div>
				  {!! Form::close() !!}
		
		  
		 </div>
		
	</div>
</div>
<!-- End Carousel   -->
	<script type="text/javascript">
	 
	
		 // Handler for .ready() called.
		$('.carousel-home').carousel({
		  interval: 2000
		});
	
	</script>
@stop