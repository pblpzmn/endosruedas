<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicycle;
use App\Models\Catalog;
use App\Models\Constant;

use Redirect;
use Illuminate\Support\Facades\View;
class BicycleController extends BaseController {

	
	/*create*/
	public function sellBicycle(Request $request) {

		$this->getPictureMessage($request);
		$this->getProductMessage(new Bicycle(), $request);

		if ($this -> messagesView == null) {
			$input = $request->all();//Input::all();
			$product = new Bicycle();
			$product -> insertBicicle($input);
			return Redirect::to('nuevo/publicar/bicicleta' ) -> with(Constant::MESSAGE_SUCCESS,'Publicacion exitosa') -> withInput();

		} else {
			Input::flash();
			// to show same data on imputs if fails
			return Redirect::to('nuevo/publicar/bicicleta') -> with(Constant::MESSAGE_ERROR, $this -> messagesView) -> withInput();
		}


	}
	
	
	public function edit($id, Request $request) {

		$this->getPictureMessage();
		$this->getProductMessage(new Bicycle());

		if ($this -> messagesView == null) {
			$input = $request->all();//Input::all();
			$product = new Bicycle();
			$input['id'] = $id;
			$product -> edit($input);
			return Redirect::to('listapublicaciones' ) -> with(Constant::MESSAGE_SUCCESS,'Edición exitosa') -> withInput();

		} else {
			Input::flash();
			// to show same data on imputs if fails
			return Redirect::to('editar/bicicleta/'.$id) -> with(Constant::MESSAGE_ERROR, $this -> messagesView) -> withInput();
		}


	}
	
	
	/*show all*/
	public function showBicycles(Request $request) {
		
		$bicycle = new Bicycle();
		// $productList = $product->findBicycles();
		$productList = $bicycle->findPaginatedBicycles($input = $request->all());
		
		// change value for catalogs
		$catalog = new Catalog();
		for($i=0; $i< count($productList) ; $i++){
			$productList[$i]->brand = $catalog->getNameById($productList[$i]->brand)['name'];
			$productList[$i]->type = $catalog->getNameById($productList[$i]->type)['name'];
		}
		
		$brandList = array(0=>'Seleccione' );
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
		
		$yearList = array(0=>'Seleccione' );
		for ($i=2021; $i >1970 ; $i--) {
			$yearList[$i] = $i;
		}
		
//		pre($productList,false);
		return View::make('bicycleGalery', array('productList' => $productList, 'is_new_options' => Constant::productValueName() 
				, 'yearList'=>$yearList, 'brandList' => $brandList ,
				'typeList' => $typeList  ,'cityList' => $cityList ));
		
	}

	/*show one*/
	public function viewBicycle( $id ) {
		$bicycle = new Bicycle();
		
		//$productList = $bicycle->findBicycle($id);
		$product = $bicycle->findBicycle($id);
		
		// change value for catalogs
		$catalog = new Catalog();
		$product->brand = $catalog->getNameById($product->brand)['name'];
		$product->type = $catalog->getNameById($product->type)['name'];
		$product->city = $catalog->getNameById($product->city)['name'];
		//pre( $product->hasPicture() );
 		//pre($product->hasPicture());
 		$user = $product->belongsToUserProduct->belongsToUser;
		return View::make('bicycleShow', array('product' => $product, 'user'=> $user ,'comments' => $bicycle->comments));

	}
	public function searchBicycles($id) {
		$bicycle = new Bicycle();
		// $productList = $product->findBicycles();
		$productList = $bicycle->brand()->model()->city()->new()->amount()->get();
				
		// pre($productList);
		return View::make('bicycleGalery', array('productList' => $productList));

	}
	

}
