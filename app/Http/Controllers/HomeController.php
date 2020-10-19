<?php

namespace App\Http\Controllers;
#namespace App\Http\Controllers\HomeController;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Catalog;
use App\Models\Constant;
use Illuminate\Support\Facades\View;
class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{

		$catalog = new Catalog();
		
		$bicycleBrandList = array(0=>'Seleccione' );
		$brand = $catalog->findByCatalogType(Constant::CATALOG_BICYCLE_BRAND_ID);
		for ($i=0; $i < count($brand) ; $i++) {
			$bicycleBrandList[$brand[$i]['id']] = $brand[$i]['name'];
		}
		
		$motorcycleBrandList = array(0=>'Seleccione' );
		$brand = $catalog->findByCatalogType(Constant::CATALOG_MOTORCYCLE_BRAND_ID);
		for ($i=0; $i < count($brand) ; $i++) {
			$motorcycleBrandList[$brand[$i]['id']] = $brand[$i]['name'];
		}
		
		$bicycleTypeList = array(0=>'Seleccione' );
		$type = $catalog->findByCatalogType(Constant::CATALOG_BICYCLE_TYPE_ID);
		for ($i=0; $i < count($type) ; $i++) {
			$bicycleTypeList[$type[$i]['id']] = $type[$i]['name'];
		}
		
		$motorcycleTypeList = array(0=>'Seleccione' );
		$type = $catalog->findByCatalogType(Constant::CATALOG_MOTO_TYPE_ID);
		for ($i=0; $i < count($type) ; $i++) {
			$motorcycleTypeList[$type[$i]['id']] = $type[$i]['name'];
		}
		
		$cityList = array(0=>'Seleccione' );
		$city = $catalog->findByCatalogType(Constant::CATALOG_CITY_ID);
		for ($i=0; $i < count($city) ; $i++) {
			$cityList[$city[$i]['id']] = $city[$i]['name'];
		}
		
		
		
		return View::make('home', array( 'is_new_options' => Constant::productValueName(),
				'product_type' => array(Constant::BICYCLE => Constant::BICYCLE_NAME ,Constant::MOTORCYCLE => Constant::MOTORCYCLE_NAME),
				'bicycleBrandList' => $bicycleBrandList ,
				'bicycleTypeList' => $bicycleTypeList  ,
				'motorcycleBrandList' => $motorcycleBrandList ,
				'motorcycleTypeList' => $motorcycleTypeList  ,
				'cityList' => $cityList ));
				
	}

}