@inject('constant', 'App\Models\Constant')
@extends('layouts.messages')

@section('title')
@parent
Galería Bicicletas
@stop

@section('content')
{!! HTML::script('js/jquery/searchableSelect/bootstrap-select.min.js') !!}

{!! HTML::style('css/searchableSelect/bootstrap-select.min.css'); !!}
{!! HTML::script('js/jquery/jquery.preimage.js') !!}
<div class="container">
	<div class="row">
		<h3 class="text-center">Encuentra la bicicleta que tu necesitas</h3>
		<button class="btn btn-default text-right input-sm" onclick="$('#validateForm').toggle();">Filtros y busqueda</button>
	</div>
	</br>	
	<div class="row">
			{!! Form::open(array('url' => 'comprar/bicicletas' ,'class' => 'form-horizontal' ,'files' => true, 'id'=>'validateForm')) !!}
			 <div class="form-group">
			  		{!! Form::label('is_new', 'Articulo', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-2">
				      {!! Form::select('is_new' , array('' => 'Seleccione')+ $is_new_options, '', array('class' => 'form-control input-sm' )) !!}
				    </div>
				    {!! Form::label('brand', 'Marca', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-2">
				      {!! Form::select('brand' , $brandList, '', array('class' => 'form-control selectpicker', 'data-container'=>"body" ,'data-live-search' => "true")) !!}
				    </div>
				    {!! Form::label('model', 'Modelo', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-2">
				      {!! Form::text('model' , '', array('class' => 'form-control input-sm','placeholder'=>'Modelo' )) !!}
				    </div>
				    {!! Form::label('type', 'Tipo', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-2">
				      {!! Form::select('type' , $typeList, '', array('class' => 'form-control selectpicker', 'data-container'=>"body" ,'data-live-search' => "true")) !!}
				    </div>
			  	    {!! Form::label('city', 'Ciudad', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-2">
				      {!! Form::select('city' , $cityList, '', array('class' => 'form-control selectpicker', 'data-container'=>"body" ,'data-live-search' => "true")) !!}
				    </div>
					{!! Form::label('amount', 'Precio', array('class' => 'col-sm-1 control-label')); !!}
				    <div class="col-sm-2">
				      {!! Form::text('amount' , '', array('class' => 'form-control ','placeholder'=>'Precio' )) !!}
				    </div>
			   </div>
			  
			  
			  <div class="form-group">
			    <div class="col-sm-offset-11 col-sm-1">
			      <button type="submit" class="btn btn-default">Buscar</button>
			    </div>
			  </div>
			  {!! Form::close() !!}
			  
		   
	
	</div>
	<div class="row">
		@foreach ($productList as $product)
		 <div class="col-md-6 col-lg-4 galery" > 
			<h4>{!! $product->title !!}</h4>
			<?php if ($product->status==$constant::STOLEN){ ?>
	 		<label class="stolen">Bicicleta Robada, ayúdanos a encontrarla</label>
	 		<?php } ?>
			
		 	@for ($i = 0; $i < 1; $i++)
		 		@if ( $product->hasPicture()  )
					<a href={!!server_root()."/vender/bicicleta/".$product->id!!}>
						{!! HTML::image($product->hasPicture()[$i]->path, 'alt-text', array('class'=>'galeryImg')) !!}
					</a>
				@endif
			@endfor
			
			<p>marca: {!! $product->brand !!}</p>
			<p>modelo: {!! $product->model !!}</p>
			<p>precio: {!! $product->amount !!}</p>
		 	
		 </div> 
		 @endforeach
	</div>
	<div class="row"> 
		{!!$productList->render()!!}
	</div> 
</div>
<script type="text/javascript">
$(function(){
  $("#validateForm").hide();
  $( ".selectpicker" ).selectpicker();
});

</script>
@stop