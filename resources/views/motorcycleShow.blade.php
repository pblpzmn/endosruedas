@inject('constant', 'App\Models\Constant')
@extends('layouts.messages')

@section('title')
@parent
Motocicletas
@stop

@section('content')

<div class="container">
	<div class="row">
		<h3 class="text-center">{!! $product->title !!}</h3>
	</div>
	<div class="row">
		 <div class="col-xs-12 col-md-4 col-lg-6">
	 		<?php if ($product->status==$constant::STOLEN){ ?>
	 			<h3 class="stolen">Motocicleta Robada, ayúdanos a encontrarla</h3>
	 		<?php } ?>
	  <!-- Start Carousel   -->
			<div id="carousel-home" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			  	@foreach ($product->hasPicture() as $key => $picture)
				  	@if ($key==0)
				    	<li data-target="#carousel-home" data-slide-to={!!$key!!} class="active"></li>
				    @else
				    	<li data-target="#carousel-home" data-slide-to={!!$key!!} ></li>
				    @endif
			    @endforeach
			  </ol>
			
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
			  	@foreach ($product->hasPicture() as $key => $picture)
					@if ($key==0)
				    	<div class="item active">
				    @else
				    	<div class="item">
				    @endif
				      <img src="../../{!!$picture->path!!}" class="img-responsive" alt="moto">
				      <div class="carousel-caption">
				        <!-- <h3>casa 4</h3> -->
				      </div>
				    </div>
							
				@endforeach
			    
			  </div>
			 	
			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-home" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			  </a>
			  <a class="right carousel-control" href="#carousel-home" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right"></span>
			  </a>
			</div>
		
		</div>
	
		<div class="col-xs-12 col-md-4 col-lg-6">
			<ul class="nav nav-tabs" id="product">
			  <li class="active" id="descriptionLi"><a href="#details" data-toggle="tab" id="descriptionTab">Detalles</a></li>
			  <li  id="buyingLi"><a href="#buying" data-toggle="tab" id="buyingTab">Compra</a></li>			  
<!-- 				<li id="preguntasLi"><a href="#preguntas" data-toggle="tab" id="preguntasTab">Preguntas previas</a></li> -->
			</ul>
		
			<div class="tab-content">
			  <div class="tab-pane" id="buying">
					
					<div class="col-md-12 col-lg-12" >	
						<strong>
							<p class="lead text-left">
								Encuéntrala en {!! $product->city !!}
							</p>
						</strong>
					</div>
					
					{!! Form::open(array('url' => 'comprar/motocicleta/'.$product->id ,'class' => 'form-horizontal' ,'files' => true, 'id'=>'validateForm')) !!}
					
					<div class="form-group">
					
						<div class="col-md-4 col-lg-12" >
							<p class=" text-left">
								<strong>Vendedor:</strong>
								<span class=" text-right">
								{!! $user->name !!}
								</span>
							</p>
						</div>
						<div class="col-md-4 col-lg-12" >
							<p class=" text-left">
								<strong>Teléfono:</strong>
								<span class=" text-right">
								{!! $user->phone !!}
								</span>
							</p>
						</div>
						<div class="col-md-4 col-lg-12" >
							<p class=" text-left">
								<strong>Celular:</strong>
								<span class=" text-right">
								{!! $user->cell_phone !!}
								</span>
							</p>
						</div>
						<div class="col-sm-offset-4 col-sm-2">
						
						
<!--							{!! Form::submit('Comprar', array('class' => 'btn btn-default')) !!}-->
						</div>
					</div>
					
					{!! Form::close() !!}
				</div>
			  <div class="tab-pane active" id="details">
				  	
						<h4 class=" text-center">Datos de la motocicleta:</h4>
							
						<div class="col-md-4 col-lg-6" >
							<p class=" text-left">
								<strong>estado:</strong>
								
								<span class=" text-right">
								{!! $constant::productValueName()[$product->is_new] !!}
								</span>
							</p>
						</div>
						
						<div class="col-md-4 col-lg-6" >
							<p class=" text-left">
								<strong>marca:</strong>
								{!! $product->brand !!}
							</p>
						</div>
					
						<div class="col-md-4 col-lg-6" >
							<p class=" text-left">
								<strong>modelo:</strong>
								{!! $product->model !!}
							</p>
						</div>
						
						<div class="col-md-4 col-lg-6" >
							<p class=" text-left">
								<strong>tipo:</strong>
								{!! $product->type !!}
							</p>
						</div>

						<div class="col-md-4 col-lg-6" >
							<p class=" text-left">
								<strong>año:</strong>
								{!! $product->year !!}
							</p>
						</div>
				
<!-- 						<div class="col-md-4 col-lg-6" >	 -->
<!-- 							<p class=" text-left"> -->
<!-- 								<strong>tamaño:</strong> -->
<!-- 								{!! $product->size !!} -->
<!-- 							</p> -->
<!-- 						</div> -->
						
						<div class="col-md-4 col-lg-6" >	
							<p class=" text-left">
								<strong>frenos:</strong>
								{!! $product->brake !!}
							</p>
						</div>
						
						<div class="col-md-4 col-lg-6" >	
							<p class=" text-left">
								<strong>velocidades:</strong>
								{!! $product->speed !!}
							</p>
						</div>
						
						<div class="col-md-4 col-lg-6" >	
							<p class=" text-left">
								<strong>precio:</strong>
								{!! $product->amount !!}
							</p>
						</div>
						
						<div class="col-md-4 col-lg-6" >	
							<p class=" text-left">
								<strong>Combustible:</strong>
								{!! $constant::gasName()[$product->gas] !!}
							</p>
						</div>
						
						<div class="col-md-8 col-lg-12" >	
							<p class=" text-left">
								<strong>descripcion:</strong>
								{!! $product->description !!}
							</p>
						</div>
				
				
				
				</div>
				
			  <div class="tab-pane" id="preguntas">
				  	
						{!! $product->comments !!}
				
				</div>
				
			</div>
		</div>
		
		
	</div>
	
	<div class="row comments">
		{!! View::make('comments.new', array('product' => $product)) !!}
	</div>
	
	
	</div> 
	
	
</div>


<script type="text/javascript">
 
$(function() {
    $('.carousel-home').carousel({
	  interval: 2000
	});
	
});

</script>
@stop