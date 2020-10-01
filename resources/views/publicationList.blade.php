@extends('layouts.messages')

@section('title')
@parent
Bicicletas y Motocicletas 
@stop

@section('content')

<div class="container">
	<div class="row">
		<h3 class="text-center">Encuentra la bicicleta que tu necesitas</h3>
	</div>
	
	<div class="table-responsive">
	  <table class="table ">
	  	<thead>
	  		<tr>
	  			<th>Producto</th>
	  			<th>Typo</th>
	  			<th>Modelo</th>
	  			<th>Marca</th>
	  			<th>Última Actualización</th>
				<th>Acciones</th>
	  		</tr>
	  	</thead>
	  	<tbody>
		@foreach ($userList as $product)
	  		<tr>
	  			@if($product->type==0)
		  			<td>{!!$product->id!!}</td>
		  			<td>Motocicleta</td>
		  			<td>{!!$product->motoModel!!}</td>
		  			<td>{!!$product->motoBrand!!}</td>
		  			<td>{!!$product->motoDate!!}</td>
		  			<td>
			  			<table>
			  				<tr>
					  			<td><a class="margin-link" href="{!!server_root()!!}/editar/motocicleta/{!!$product->product_id!!}"> Editar </a></td>
					  			
					  			<td><a class="margin-link" href="{!!server_root()!!}/vender/motocicleta/{!!$product->product_id!!}"> Ver </a></td>
				  			</tr>
			  			</table>
			  		</td>
	  			@endif
	  			@if($product->type==1)
		  			<td>{!!$product->id!!}</td>
		  			<td>Bicicleta</td>
		  			<td>{!!$product->bicyModel!!}</td>
		  			<td>{!!$product->bicyBrand!!}</td>
		  			<td>{!!$product->bicyDate!!}</td>
		  			<td>
			  			<table>
			  				<tr>
					  			<td ><a class="margin-link" href="{!!server_root()!!}/editar/bicicleta/{!!$product->product_id!!}"> Editar </a></td>
					  			<td><a class="margin-link" href="{!!server_root()!!}/vender/bicicleta/{!!$product->product_id!!}"> Ver </a></td>
					  		</tr>
			  			</table>
		  			</td>
	  			@endif
					
	  		</tr>
	  	@endforeach
	  	</tbody>
	    <?php //pre($product,false)?>
	  </table>
	</div>
	
	<div class="row"> 
		{!!$userList->render()!!}
	</div> 
</div>
@stop