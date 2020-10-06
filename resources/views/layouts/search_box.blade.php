@extends('layouts.messages')
@section('search_box')
{!! HTML::script('js/jquery/searchableSelect/bootstrap-select.min.js') !!}
{!! HTML::style('css/searchableSelect/bootstrap-select.min.css'); !!}
{!! HTML::script('js/jquery/jquery.preimage.js') !!}
<div class="col-md-3 ">
	<div class="col-md-12 col-sm-12 ">  
	<h4 class="text-center">Filtros</h4> 
	
			{!! Form::open(array('url' => 'comprar/motocicletas' ,'class' => 'form-horizontal' ,'files' => true, 'id'=>'validateForm')) !!}
			  <div class="form-group">
			  		{!! Form::label('is_new', 'Articulo', array('class' => 'col-sm-3 control-label')); !!}
				    <div class="col-sm-9">
				      {!! Form::select('product_type' , $product_type, '', array('class' => 'form-control ' , 'onChange' => 'productChanged(this)' )) !!}
				    </div>
			  		{!! Form::label('is_new', 'Articulo', array('class' => 'col-sm-3 control-label')); !!}
				    <div class="col-sm-9">
				      {!! Form::select('is_new' , array('' => 'Seleccione')+ $is_new_options, '', array('class' => 'form-control ' )) !!}
				    </div>
				    {!! Form::label('brand', 'Marca', array('class' => 'col-sm-3 control-label ')); !!}
				    <div class="col-sm-9 motorcycleFlag">
				      {!! Form::select('brand' , $motorcycleBrandList, '', array('class' => 'form-control selectpicker')) !!}
				    </div>
				    <div class="col-sm-9 bicycleFlag">
				      {!! Form::select('brand' , $bicycleBrandList, '', array('class' => 'form-control selectpicker')) !!}
				    </div>

				    {!! Form::label('type', 'Tipo', array('class' => 'col-sm-3 control-label')); !!}
				    <div class="col-sm-9  bicycleFlag">
				      {!! Form::select('type' , $bicycleTypeList, '', array('class' => 'form-control selectpicker')) !!}
				    </div>
				    <div class="col-sm-9 motorcycleFlag">
				      {!! Form::select('type' , $motorcycleTypeList, '', array('class' => 'form-control selectpicker')) !!}
				    </div>
			  	    {!! Form::label('city', 'Ciudad', array('class' => 'col-sm-3 control-label')); !!}
				    <div class="col-sm-9">
				      {!! Form::select('city' , $cityList, '', array('class' => 'form-control selectpicker')) !!}
				    </div>
					{!! Form::label('amount', 'Precio', array('class' => 'col-sm-3 control-label')); !!}
				    <div class="col-sm-9">
				      {!! Form::text('amount' , '', array('class' => 'form-control','placeholder'=>'Precio' )) !!}
				    </div>
			   </div>
			  
			  
			  <div class="form-group">
			    <div class="col-sm-offset-8 col-sm-2">
			      <button type="submit" class="btn btn-default">Buscar</button>
			    </div>
			  </div>
			  {!! Form::close() !!}
  
  </div>	
</div>
<script type="text/javascript">
$(function(){
  
  $( ".selectpicker" ).selectpicker();
  $( ".bicycleFlag" ).hide();
});
function productChanged(obj){
	  if (obj.value == 1 ){
		$( ".bicycleFlag" ).show();
		$( ".motorcycleFlag" ).hide();
		$('#validateForm').attr('action', "comprar/bicicletas");
	  }else{
		  $( ".bicycleFlag" ).hide();
		  $( ".motorcycleFlag" ).show();
		  $('#validateForm').attr('action', "comprar/motocicletas");
	  }
}

</script>
@stop