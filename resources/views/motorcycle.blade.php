@extends('layouts.messages')

@section('title')
@parent
Bicicletas y Motocicletas 
@stop

@section('content')
{!! HTML::script('js/jquery/searchableSelect/bootstrap-select.min.js') !!}

{!! HTML::style('css/searchableSelect/bootstrap-select.min.css'); !!}
{!! HTML::script('js/jquery/jquery.preimage.js') !!}
<div class="container">
		<?php if (Auth::check()){ ?>
		<ul class="nav nav-tabs" id="product">
		  <li id="motorcycleLi" class="active"><a href="#motorcicle" data-toggle="tab" id="motorcicleTab">Motocicleta</a></li>
		</ul>
		
		<!-- Tab panes -->
		
			
		   <div class="tab-pane" id="motorcicle">
		   
		   		<h2>
				  <?php if ($product->actionType==1){ ?>
				  Publica tu motocicleta
				  <?php }else{?> 
				  Edita tu motocicleta
				  <?php }?>
				</h2>
		   

			  {!! Form::open(array('url' => $product->action.$product->id ,'class' => 'form-horizontal' ,'files' => true, 'id'=>'validateForm')) !!}
				
				<div class="form-group">
		  		{!! Form::label('title', 'Título', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-11">
			      {!! Form::text('title' , $product->title, array('class' => 'form-control','placeholder'=>'Título del anuncio' )) !!}
			    </div>
				</div>
				
				
  			  <div class="form-group">
			  		{!! Form::label('is_new', 'Articulo', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::select('is_new' , $is_new_options, $product->is_new, array('class' => 'form-control' )) !!}
				    </div>
				    {!! Form::label('type', 'Tipo', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::select('type' , $typeList, '$product->type', array('class' => 'form-control selectpicker', 'data-container'=>"body" ,'data-live-search' => "true")) !!}
				    </div>
				    {!! Form::label('brand', 'Marca', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::select('brand' , $brandList, $product->brand, array('class' => 'form-control selectpicker', 'data-container'=>"body" ,'data-live-search' => "true")) !!}
				    </div>
			  </div>
			  			  
			  
			  <div class="form-group">
				    {!! Form::label('model', 'Modelo', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::text('model' , $product->model, array('class' => 'form-control','placeholder'=>'Modelo' )) !!}
				    </div>
					 {!! Form::label('year', 'Año', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::select('year' , $yearList, $product->year, array('class' => 'form-control')) !!}
				    </div>
				    {!! Form::label('city', 'Ciudad', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::select('city' , $cityList, $product->city, array('class' => 'form-control selectpicker', 'data-container'=>"body" ,'data-live-search' => "true")) !!}
				    </div>
			   </div>
			  
			  
			  <div class="form-group">
				    {!! Form::label('cylinder_capacity', 'Cilindraje cc', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::text('cylinder_capacity' , $product->cylinder_capacity, array('class' => 'form-control','placeholder'=>'Cilindraje en cc' )) !!}
				    </div>  
				    {!! Form::label('kilometer', 'Kilometraje', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::text('kilometer' , $product->kilometer, array('class' => 'form-control','placeholder'=>'Kilometraje' )) !!}
				    </div>
				    {!! Form::label('speed', 'Velocidades', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::select('speed' , $speedList, $product->speed, array('class' => 'form-control')) !!}
				    </div>

			  </div>

			  <div class="form-group">  
				    {!! Form::label('color', 'Color', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::text('color' , $product->color, array('class' => 'form-control','placeholder'=>'Color' )) !!}
				    </div>
				    {!! Form::label('gas', 'Combustible', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::select('gas' , $gasList, $product->gas, array('class' => 'form-control')) !!}
				    </div>
				    {!! Form::label('amount', 'Precio', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::text('amount' , $product->amount, array('class' => 'form-control','placeholder'=>'Precio' )) !!}
				    </div>
				    
			  </div>
			  
			  <div class="form-group">  
			    {!! Form::label('imagen', '', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-3">
			      {!! Form::file('files[picture1]', array('multiple'=>true, 'id' => 'file_1', 'class'=>"file" )); !!}
			    </div>
			    {!! Form::label('', '', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-3">
			      {!! Form::file('files[picture2]', array('multiple'=>true, 'id' => 'file_2','class'=>"file" )) !!}
			    </div>
			    {!! Form::label('', '', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-3">
			      {!! Form::file('files[picture3]', array('multiple'=>true, 'id' => 'file_3' ,'class'=>"file" )); !!}
			    </div>
			  </div>
			  <div class='hidden-phone hidden-tablet form-group ' id="previewMotorcycleGroup">
			  	  <div class="col-sm-1">
			  	  Imagenes
			  	  </div>
				  <div class="col-sm-3">
					  <div id="prev_file_1"></div><br/>
				  </div>
				  <div class="col-sm-1">
			  	  </div>
				  <div class="col-sm-3">
				  	<div id="prev_file_2"></div><br/>
				  </div>
				  <div class="col-sm-1">
			  	  </div>
				  <div class="col-sm-3">
				  	<div id="prev_file_3"></div><br/>
				  </div>
			  </div>
			  <div class="form-group">
			    {!! Form::label('description', '', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-11">
			      {!! Form::textarea('description' , $product->description , array('class' => 'form-control','placeholder'=>'Pon aquí información adicional ' )) !!}
			    </div>
			   
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-11 col-sm-1">
			      <button type="submit" class="btn btn-default"><?php if ($product->actionType==1){ ?>Publicar<?php }else{?> Actualizar<?php }?></button>
			    </div>
			  </div>
			  {!! Form::close() !!}
			
			<?php }else{ ?>
				<h2 class="text-center">Para publicar <a class="h2" href="{!!server_root()!!}/registro"><u>registráte</u></a> o 
					<a class="h2" href="{!!server_root()!!}/login"><u>inicia sesión</u></a> </h2>						
			<?php }?>
			</div><!-- end tab motocycle --> 
		</div>
	 
</div>
{!! HTML::script('js/jquery/jquery.preimage.js') !!}
<script type="text/javascript">
		
		$(document).ready(function()
				{
					$( ".selectpicker" ).selectpicker();
					
//					$("#validateForm").validate({
//					  rules: {
//						  price: {
//						      required: true,
//						      number: true
//						    },
//						    files: {
//							      accept: "image/*"
//							    }
//						    
//						  }
//					});			
					
					// preview images
					$('.file').preimage();
					$('#previewBicycleGroup').hide();
					$('.file').change(function() {
				    	$('#previewBicycleGroup').show();
					});
					$('#previewMotorcycleGroup').hide();
					$('.file').change(function() {
				    	$('#previewMotorcycleGroup').show();
					});
				});

</script>
@stop

