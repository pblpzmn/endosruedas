<!-- 
{{ Form::open(array('url' => 'crear/comentario/'.$product->id ,'class' => 'form-horizontal' ,'files' => true, 'id'=>'validateForm')) }}

<h3 class="text-left">Preguntas al vendedor</h3> 
  <?php if (Auth::check()){ ?>
	<div class="form-group">
			{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-offset-3 col-sm-1 control-label')) }}

	    <div class=" col-sm-5">
	     {{ Form::text('name', Auth::user() -> name, array('class' => 'form-control', 'placeholder'=>'')) }}
	    </div>

  </div>
	
  <div class="form-group">
			{{ Form::label('email', 'Email', array('class' => 'col-sm-offset-3 col-sm-1 control-label')) }}

	    <div class=" col-sm-5">
	     {{ Form::text('fromEmail', Auth::user() -> email, array('class' => 'form-control', 'placeholder'=>'')) }}
	    </div>

  </div>
	
	<?php } ?>


	    <div class="hidden">
	     {{ Form::text('toEmail', $product->belongsToUserProduct->belongsToUser->id, array('class' => 'form-control', 'placeholder'=>'')) }}
	    </div>


	<div class="form-group">
			{{ Form::label('comment', 'Pregunta', array('class' => 'col-sm-offset-3 col-sm-1 control-label')) }}
	    <div class=" col-sm-5">
	     {{ Form::textarea('comment', Input::old('comment'), array('class' => 'form-control', 'rows' => 3, 'placeholder'=>'¿Qué deseas saber?')) }}
			</div>
			
  </div>
	<div class="form-group">
		<div class="col-sm-offset-8 col-sm-2">
			{{ Form::submit('Pregunta', array('class' => 'btn btn-default')) }}
		</div>
	</div>
					

	{{ Form::close() }}
	
	-->