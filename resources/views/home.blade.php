@extends('layouts.left_side')

@section('title')
@parent
Bicicletas y Motocicletas 
@stop

@section('content')


	<div class="col-md-9 visible-desktop">
		<div class="backgroundImg icon-container ">
			
			<div class="col-md-6 ">
				<a href="{!!server_root()!!}/comprar/motocicletas" class="motorcycle-icon img-responsive" ></a>
				
			</div>
			<div class="col-md-6 ">
				
				<a href="{!!server_root()!!}/comprar/bicicletas" class="bicycle-icon img-responsive" ></a>
				
			</div>
		</div>	
	</div>	
	

	

@stop
