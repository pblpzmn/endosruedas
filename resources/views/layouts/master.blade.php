<!DOCTYPE html>
<html>
	<head>
		<title> @section('title')
			@show </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" type="img/png" href="img/N2RICONO.png"/>
		<meta name="description" content="Endosruedas: Compra Venta de Bicicletas y Motocicletas" />
		<meta name="Keywords" content="endosruedas,dos,2,2ruedas,2 ruedas,dosruedas,www.endosruedas.com,www.endosruedas.com.ec,dos ruedas,Ecuador,ecuador,publica,publicar,compra,comprar,venta,vender,bicileta,biciletas,bici,bicis,motocicleta,motocicletas,moto,motos"/>
		<meta name="robots" content="index,follow">
		<!-- CSS are placed here -->
		{!! HTML::style('bootstrap/css/bootstrap.css') !!}
		{!! HTML::style('bootstrap/css/bootstrap-responsive.css') !!}
		{!! HTML::style('css/app.css') !!}

		<!-- js are placed here -->
		{!! HTML::script('js/jquery/jquery-1.11.0.min.js') !!}
	</head>

	<body>
		<!-- Navbar -->
			<!-- navbar-fixed-top -->
		<nav class="navbar navbar-inverse transparent-nav menu" role="navigation">   
			
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				
				<div class="navbar-header">
					
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						
					</button>
					 <a class="navbar-brand" href="{!!server_root()!!}">Endosruedas</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav">
						
						
						<li class="dropdown">
								<a href="#" class="dropdown-toggle text-white"  data-toggle="dropdown">Publica tu Bicicleta
								<b class="caret"></b></a> 
								<ul class="dropdown-menu">
									<li>
										<a href="{!!server_root()!!}/nuevo/publicar/bicicleta">Publica tu Bicicleta</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="{!!server_root()!!}/nuevo/publicar/bicicletaRobada">Publica tu Bicicleta Robada</a>
									</li>
								</ul>
							</li>						
						<li>
							<a href="{!!server_root()!!}/nuevo/publicar/motocicleta">Publica tu Motocicleta</a>
						</li>
						<!-- 		        <li class="divider-vertical"></li> -->
						<li>
							<a href="{!!server_root()!!}/comprar/bicicletas">Galería Bicicletas</a>
						</li>
						<!-- 		        <li class="divider-vertical"></li> -->
						<li>
							<a href="{!!server_root()!!}/comprar/motocicletas">Galería Motocicletas</a>
						</li>
						<!-- 		        <li class="divider-vertical"></li> -->
						<li>
							<!-- <a href="{!!server_root()!!}/accesorios">Accesorios</a> -->
						</li>
						<!-- 		        <li class="divider-vertical"></li> -->
						<li>
							<!-- <a href="{!!server_root()!!}/taller">Taller</a> -->
						</li>
						<!-- 		        <li class="divider-vertical"></li> -->
						<li>
							<!-- <a href="{!!server_root()!!}/comunidad">Comunidad</a> -->
						</li>
						<!-- 		        <li class="divider-vertical"></li> -->
						<li>
							<a href="{!!server_root()!!}/contactanos">Contáctanos</a>
						</li>
					</ul>
					<ul class="nav navbar-nav last-menu">	
						<?php if (Auth::check()){
							?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle text-white"  data-toggle="dropdown">{!!Str::title(Auth::user() -> name) !!} 
								<b class="caret"></b></a> 
								<ul class="dropdown-menu">
									<li>
										<a href="{!!server_root()!!}/perfil">Perfil</a>
									</li>
									<li>
										<a href="{!!server_root()!!}/listapublicaciones">Mis Publicaciones</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="{!!server_root()!!}/logout">Cerrar sesion</a>
									</li>
								</ul>
							</li>
						<?php }else{ ?>
						
							<li >
								<a class="text-white" href="{!!server_root()!!}/registro">Registro</a>
							</li>
							<li>
								<a class="text-white" href="{!!server_root()!!}/login">Login</a>
							</li>
						<?php } ?>
						
					</ul>
					<!-- <form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">
							Submit
						</button>
					</form> -->
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		
		
		<div class="container">
			
			<div class="row">
				<div class="col-md-6 col-lg-6 hidden-phone">
					<a class="logo" href="{!!server_root()!!}"></a>
				</div>
				<!-- <div class="visible-phone">
					<a href="{!!server_root()!!}">Inicio</a>
				</div> -->
				
<!--				<div class="col-xs-12 col-sm-offset-5 col-sm-7 content">-->
				<div class="col-xs-12 col-md-6 col-lg-6 content">
					<div class="col-lg-12">
	
					<!-- </div>
					<div class="col-lg-12"> -->
						<h4 class="text-right">
							Publica - Compra - Vende 
							<h4 class="text-right">Todo lo que buscas <strong>EN DOS RUEDAS.</strong> 
						</h4>
						
						<h3 class="text-right hidden-phone">
							Bicicletas y motocicletas.
						</h3>
						<h5 class="text-right stolen">
							Publica tu bicicleta robada <a href="/nuevo/publicar/bicicletaRobada">aquí</a>
						</h5>
					</div>
				</div>
			</div>
		</div>

		

		<!-- Container -->

		@yield('messages')
		
		<!-- Content -->
		<div class="full">

			@yield('content')
		</div>
		<div class="container">
			@yield('search_box')

		</div>
		<div class="info-row text-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-12 hidden-phone">
						<h5>Vende y compra desde la comodidad de tu hogar con tan solo unos clicks!</h5>
					</div>
					<div class="col-md-6 col-lg-6 hidden-phone">
						<h5><strong>Bicicletas</strong></h5>
						<ul class="nav text-small">
							<li>Nuevas</li>
							<li>Usadas</li>
							<li>Gt</li>
							<li>Specialized</li>
							<li>Trek</li>
							<li>Otros</li>
						</ul>
					</div>
					<div class="col-md-6 col-lg-6 hidden-phone">
						<h5><strong>Motocicletas</strong></h5>
						<ul class="nav text-small">
							<li>Nuevas</li>
							<li>Usadas</li>
							<li>Yamaha</li>
							<li>Honda</li>
							<li>Suzuki</li>
							<li>Otros</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="footer-container" >
				<div class="container">
				<div class="row">
					<div class="col-md-6">
							<p>Queremos darte un excelente servicio </br>
							envíanos tus comentarios y sugerencias <strong><a href="{!!server_root()!!}/contactanos">contáctanos!!</a></strong></p>
					</div>
					<div class="col-md-6">
						<span class="text-white text-right">
							<p>
								en dos ruedas 2020
							</p> 
						</span>
					</div>
				</div>
				</div>
			</div>
		</footer>

		<!-- Scripts are placed here -->

		{!! HTML::script('bootstrap/js/bootstrap.min.js') !!}
		{!! HTML::script('js/jquery/validate/jquery.validate.min.js') !!}
		{!! HTML::script('js/jquery/validate/messages_es.js') !!}
		{!! HTML::script('js/jquery/jquery.cookie.js') !!}
		{!! HTML::script('js/app.js') !!}

	</body>
</html>
