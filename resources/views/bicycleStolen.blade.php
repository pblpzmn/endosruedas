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
		<h2 class="text-center">
				  Publica tu bicicleta Robada para que la comunidad esté atenta, te ayuden a encontrarla y no la compren.<br>
		</h2>
		<?php if (Auth::check()){ ?>
		<ul class="nav nav-tabs" id="product">
		  <li class="active" id="bicycleLi"><a  href="#bicycle" data-toggle="tab" id="bicycleTab">Bicicleta</a></li>
		  
		</ul>
		
		
		<!-- Tab panes -->
		<div class="tab-content">

		  <div class="tab-pane active" id="bicycle">
			<h2>

			</h2>
		  	{!! Form::open(array('url' => $product->action.$product->id ,'class' => 'form-horizontal' ,'files' => true, 'id'=>'validateForm')) !!}
				
			 <div class="form-group">
		  		{!! Form::label('status', 'Estado', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-2">
			      <?php if ($product->actionType<>1){ ?>
			      	{!! Form::select('status' , $editStatus,  $product->status, array('class' => 'form-control' )) !!}
			      <?php }else{?> 
			      	{!! Form::select('status' , $newStatus, $product->status, array('class' => 'form-control' )) !!}
			      <?php }?>
			    </div>
			 </div>
			
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
				      
				      {!! Form::select('type' , $typeList, $product->type, array('class' => 'form-control')) !!}
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
			  		{!! Form::label('brake', 'Frenos', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::text('brake' , $product->brake, array('class' => 'form-control','placeholder'=>'Frenos' )) !!}
				    </div>
			  		{!! Form::label('speed', 'Velocidades', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::select('speed' , $speedList, $product->speed, array('class' => 'form-control')) !!}
				    </div>
				
				    {!! Form::label('size', 'Tamaño', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				    {!! Form::select('size' , $sizeList, $product->size, array('class' => 'form-control selectpicker', 'data-container'=>"body" ,'data-live-search' => "true")) !!}
				      
				    </div>
			  </div>
			  <div class="form-group">
			      {!! Form::label('amount', 'Precio', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-3">
				      {!! Form::text('amount' , $product->amount, array('class' => 'form-control','placeholder'=>'Precio' )) !!}
				    </div>
			  </div>
			  <div class="form-group">  
			    {!! Form::label('imagen', '', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-3">
			      {!! Form::file('files[picture1]', array('multiple'=>true, 'id' => 'file1', 'class'=>"file" )); !!}
			    </div>
			    {!! Form::label('', '', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-3">
			      {!! Form::file('files[picture2]', array('multiple'=>true, 'id' => 'file2','class'=>"file" )) !!}
			    </div>
			    {!! Form::label('', '', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-3">
			      {!! Form::file('files[picture3]', array('multiple'=>true, 'id' => 'file3' ,'class'=>"file" )); !!}
			    </div>
			  </div>
			  <div class="form-group">  
			    {!! Form::label('', '', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-3">
			      {!! Form::file('files[picture4]', array('multiple'=>true, 'id' => 'file4', 'class'=>"file" )); !!}
			    </div>
			    {!! Form::label('', '', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-3">
			      {!! Form::file('files[picture5]', array('multiple'=>true, 'id' => 'file5','class'=>"file" )) !!}
			    </div>
			    {!! Form::label('', '', array('class' => 'col-sm-1 control-label')); !!}
			    <div class="col-sm-3">
			      {!! Form::file('files[picture6]', array('multiple'=>true, 'id' => 'file6' ,'class'=>"file" )); !!}
			    </div>
			  </div>
			  <div class='hidden-phone hidden-tablet form-group ' id="previewBicycleGroup">
			  	  <div class="col-sm-1">
			  	  Imagenes
			  	  </div>
				  <div class="col-sm-3">
					  <div id="prev_file1"></div><br/>
				  </div>
				  <div class="col-sm-1">
			  	  </div>
				  <div class="col-sm-3">
				  	<div id="prev_file2"></div><br/>
				  </div>
				  <div class="col-sm-1">
			  	  </div>
				  <div class="col-sm-3">
				  	<div id="prev_file3"></div><br/>
				  </div>
			  	  <div class="col-sm-1">
			  	  </div>
				  <div class="col-sm-3">
					  <div id="prev_file4"></div><br/>
				  </div>
				  <div class="col-sm-1">
			  	  </div>
				  <div class="col-sm-3">
				  	<div id="prev_file5"></div><br/>
				  </div>
				  <div class="col-sm-1">
			  	  </div>
				  <div class="col-sm-3">
				  	<div id="prev_file6"></div><br/>
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
			  
		   </div> <!--  end tab bicycle -->
			
			
		  </div>
	 	  <?php }else{ ?>
				<h2 class="text-center">Para publicar <a class="h2" href="{!!server_root()!!}/registro"><u>regístrate</u></a> o 
					<a class="h2" href="{!!server_root()!!}/login"><u>inicia sesión</u></a> </h2>			
		   <?php }?>
</div>


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

