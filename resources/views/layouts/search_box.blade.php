@extends('layouts.messages')
@section('search_box')
<script type="text/javascript" href="{{ secure_asset('js/jquery/searchableSelect/bootstrap-select.min.js') }}"></script>
<link rel="stylesheet" href="{{ secure_asset('css/searchableSelect/bootstrap-select.min.css')}}"/>
<script type="text/javascript" href="{{ secure_asset('js/jquery/jquery.preimage.js')}}"></script>
<div class="row">
	<div class="col-md-3 ">
		<div class="col-md-12 col-sm-12 ">  
		<h4 class="text-center">Filtros</h4> 
		
				{!! Form::open(array('url' => 'comprar/bicicletas' ,'class' => 'form-horizontal' ,'files' => true, 'id'=>'validateForm')) !!}
				  <div class="form-group">
				  		{!! Form::label('is_new', 'Articulo', array('class' => 'col-sm-3 control-label')); !!}
					    <div class="col-sm-9">
					      {!! Form::select('product_type' , $product_type, '', array('class' => 'form-control ' , 'onChange' => 'productChanged(this)' )) !!}
					    </div>
				  		{!! Form::label('is_new', 'Estado', array('class' => 'col-sm-3 control-label')); !!}
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
						{!! Form::label('amountFrom', 'Precio:', array('class' => 'col-sm-12 ')); !!}
						{!! Form::label('amountFrom', 'Desde', array('class' => 'col-sm-3 control-label')); !!}
						<br>
					    <div class="col-sm-9">
					      {!! Form::text('amountFrom' , '', array('class' => 'form-control','placeholder'=>'Precio desde' )) !!}
					    </div>
						<br>
						<br>
					    {!! Form::label('amountTo', 'Hasta', array('class' => 'col-sm-3 control-label')); !!}
					    <div class="col-sm-9">
					      {!! Form::text('amountTo' , '', array('class' => 'form-control','placeholder'=>'Precio hasta' )) !!}
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
</div>
<script type="text/javascript">
$(function(){
  
  $( ".selectpicker" ).selectpicker();
  $( ".motorcycleFlag" ).hide();
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