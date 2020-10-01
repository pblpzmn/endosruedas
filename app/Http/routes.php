<?php
use App\Models\Motorcycle;
use App\Models\Bicycle;
use App\Models\Catalog;
use App\Models\Constant;


Route::get('login', function() {
	return View::make('login');
});
Route::get('registro', function() {
	return View::make('register');
});

Route::get('logout', 'UserController@logout');
Route::get('galeria', function() {
	return View::make('galery');
});

Route::post('register', 'UserController@create');
Route::post('login', 'UserController@login');

Route::get('comprar/bicicletas', 'BicycleController@showBicycles');
Route::post('comprar/bicicletas', 'BicycleController@showBicycles');
Route::get('comprar/motocicletas', 'MotorcycleController@showMotorcycles');
Route::post('comprar/motocicletas', 'MotorcycleController@showMotorcycles');
Route::get('vender/bicicleta/{id}', 'BicycleController@viewBicycle');
Route::post('crear/comentario/{id}', 'CommentsController@create');
Route::get('vender/motocicleta/{id}', 'MotorcycleController@viewMotorcycle');
// Por ultimo crearemos un grupo con el filtro auth.
// Para todas estas rutas el usuario debe haber iniciado sesión.
// En caso de que se intente entrar y el usuario haya iniciado session
// entonces sera redirigido a la ruta login
Route::group(array('before' => 'auth'), function() {

	// Route::get('inicio', function() {
		// echo 'Bienvenido ';
// 
		// // Con la función Auth::user() podemos obtener cualquier dato del usuario
		// // que este en la sesión, en este caso usamos su email y su id
		// // Esta función esta disponible en cualquier parte del código
		// // siempre y cuando haya un usuario con sesión iniciada
		// echo 'Bienvenido ' . Auth::user() -> email . ', su Id es: ' . Auth::user() -> id;
	// });
	
	/*BICYCLES*/
	Route::get('nuevo/publicar/bicicleta', function() {
		
		$product = new Bicycle();
		$product['action'] = "vender/bicicleta";
		$product['actionType'] = 1;
		
		return filtersBicycle($product);
		
		
	});
	Route::post( 'vender/bicicleta', 'BicycleController@sellBicycle');
	
	Route::get('editar/bicicleta/{id}',function($id) {
		
		$bicycle = new Bicycle();
		$product = $bicycle->findBicycle($id);
		$product['action'] = "editar/bicicleta/";
		$product['actionType'] = 2;
		
		return filtersBicycle($product);
		

	});
	Route::post( 'editar/bicicleta/{id}' , 'BicycleController@edit');

	/*MOTORCYCLES*/
	Route::get('nuevo/publicar/motocicleta', function() {
		
		$product = new Motorcycle();
		$product['action'] = "vender/motocicleta";
		$product['actionType'] = 1;
		
		return filtersMotorcycle($product);
		
	});
	Route::post( 'vender/motocicleta', 'MotorcycleController@sellMotorcycle');
	
	Route::get('editar/motocicleta/{id}',function($id) {
		
		$motorcycle = new Motorcycle();
		$product = $motorcycle->findMotorcycle($id);
		$product['action'] = "editar/motocicleta/";
		$product['actionType'] = 2;
		
		return filtersMotorcycle($product);
		
	});
	Route::post( 'editar/motocicleta/{id}' , 'MotorcycleController@edit');
	
	Route::get('perfil', function() {
		return View::make('profile');
	});
	Route::post('perfil', 'UserController@update');
	
	Route::get('listapublicaciones', 'UserController@publicationList');
		
	

});

/**************END USER AUTHENTICATE************/

Route::get('/', 'HomeController@showWelcome');


//Route::controller('password', 'RemindersController');

Route::get('remainPassword', function() {
	return View::make('emails/auth/reminder');
});

Route::get('contactanos', function() {

    return View::make('contact_us');

});
Route::post('contact_us', 'ContactUsController@contact_us');
Route::get('contactanosB', function() {

    return View::make('emails.contact_buyer');

});

Route::get('/robots.txt', function() {
    Robots::addUserAgent('*');
    Robots::addDisallow('/cgi-bin/');

    $response = Response::make(Robots::generate(), 200);
    $response->header('Content-Type', 'text/plain');

    return $response;
});




/** Filling filters  **/

function filtersBicycle($product){
	
	$speedList = array(0=>'Seleccione' );
	for ($i=30; $i > 0; $i--) {
		$speedList[$i] = $i;
	}
	$yearList = array(0=>'Seleccione' );
	for ($i=2015; $i >1970 ; $i--) {
		$yearList[$i] = $i;
	}
	
	$brandList = array(0=>'Seleccione' );
	
	$catalog = new Catalog();
	$brand = $catalog->findByCatalogType(Constant::CATALOG_BICYCLE_BRAND_ID);
	for ($i=0; $i < count($brand) ; $i++) {
		$brandList[$brand[$i]['id']] = $brand[$i]['name'];
	}
	
	$typeList = array(0=>'Seleccione' );
	$type = $catalog->findByCatalogType(Constant::CATALOG_BICYCLE_TYPE_ID);
	for ($i=0; $i < count($type) ; $i++) {
		$typeList[$type[$i]['id']] = $type[$i]['name'];
	}
	
	$cityList = array(0=>'Seleccione' );
	$city = $catalog->findByCatalogType(Constant::CATALOG_CITY_ID);
	for ($i=0; $i < count($city) ; $i++) {
		$cityList[$city[$i]['id']] = $city[$i]['name'];
	}
	
	return View::make('bicycle', array('product'=>$product,'is_new_options' => Constant::productValueName() ,
			'yearList'=>$yearList, 'speedList'=>$speedList, 'brandList' => $brandList, 'typeList' => $typeList ,
			'sizeList' => Constant::bikeSizeName() , 'cityList' => $cityList));
	
}


function filtersMotorcycle($product){

	$speedList = array(0=>'Seleccione' );
	for ($i=6; $i >0; $i--) {
		$speedList[$i] = $i;
	}
	$yearList = array(0=>'Seleccione' );
	for ($i=2021; $i >1970 ; $i--) {
		$yearList[$i] = $i;
	}
	
	$catalog = new Catalog();
	
	$brandList = array(0=>'Seleccione' );
	$brand = $catalog->findByCatalogType(Constant::CATALOG_MOTORCYCLE_BRAND_ID);
	for ($i=0; $i < count($brand) ; $i++) {
		$brandList[$brand[$i]['id']] = $brand[$i]['name'];
	}
	
	$typeList = array(0=>'Seleccione' );
	$type = $catalog->findByCatalogType(Constant::CATALOG_MOTO_TYPE_ID);
	for ($i=0; $i < count($type) ; $i++) {
		$typeList[$type[$i]['id']] = $type[$i]['name'];
	}
	
	$cityList = array(0=>'Seleccione' );
	$city = $catalog->findByCatalogType(Constant::CATALOG_CITY_ID);
	for ($i=0; $i < count($city) ; $i++) {
		$cityList[$city[$i]['id']] = $city[$i]['name'];
	}
	
	$gasList = array(Constant::GAS => Constant::gasName()[Constant::GAS],
			Constant::DIESEL => Constant::gasName()[Constant::DIESEL ] );
	
	return View::make('motorcycle', array('product'=>$product,'is_new_options' => Constant::productValueName()
			, 'yearList'=>$yearList, 'speedList'=>$speedList ,
			'brandList' => $brandList ,'typeList' => $typeList  ,'cityList' => $cityList , 'gasList' => $gasList));

}

