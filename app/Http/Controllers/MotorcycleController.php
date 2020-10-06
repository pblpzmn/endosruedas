<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorcycle;
use App\Models\Catalog;
use App\Models\Constant;
use Redirect;

use Illuminate\Support\Facades\View;
class MotorcycleController extends BaseController {

	/*create*/
	public function sellMotorcycle(Request $request) {

		$this->getPictureMessage($request);
		$this->getProductMessage(new Motorcycle(),  $request);

		if ($this -> messagesView == null) {
			$input = $request->all();//Input::all();
			$product = new Motorcycle();
			$product -> insertMotorcicle($input);
			return Redirect::to('nuevo/publicar/motocicleta') -> with(Constant::MESSAGE_SUCCESS, 'Publicacion exitosa') -> withInput();

		} else {
			$request -> flash();
			// to show same data on imputs if fails
			return Redirect::to('nuevo/publicar/motocicleta') -> with(Constant::MESSAGE_ERROR, $this -> messagesView) -> withInput();
		}

	}

	public function edit(Request $request, $id) {

		$this->getPictureMessage($request);
		$this->getProductMessage(new Motorcycle(),  $request);

		if ($this -> messagesView == null) {
			$input = $request->all();//Input::all();
			$product = new Motorcycle();
			$input['id'] = $id;
			$product -> edit($input);
			return Redirect::to('listapublicaciones' ) -> with(Constant::MESSAGE_SUCCESS,'Edición exitosa') -> withInput();

		} else {
			$request -> flash();
			// to show same data on imputs if fails
			return Redirect::to('editar/motocicleta/'.$id) -> with(Constant::MESSAGE_ERROR, $this -> messagesView) -> withInput();
		}

	}
	
	/*show all*/
	public function showMotorcycles(Request $request) {
		$input = $request->all();//Input::all();
		$motorcycle = new Motorcycle();
		$productList = $motorcycle->findPaginatedMotorcycles($input);

		
		// change value for catalogs
		$catalog = new Catalog();
		for($i=0; $i< count($productList) ; $i++){
			$productList[$i]->brand = $catalog->getNameById($productList[$i]->brand)['name'];
			$productList[$i]->type = $catalog->getNameById($productList[$i]->type)['name'];
		}
		
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
		
		$yearList = array(0=>'Seleccione' );
		for ($i=2021; $i >1970 ; $i--) {
			$yearList[$i] = $i;
		}
		
		//		pre($productList,false);
		return View::make('motorcycleGalery', array('productList' => $productList, 'is_new_options' => Constant::productValueName()
				, 'yearList'=>$yearList, 'brandList' => $brandList ,
				'typeList' => $typeList  ,'cityList' => $cityList ));

	}

	/*show one*/
	public function viewMotorcycle($id) {
		$moto = new Motorcycle();
		// $productList = $product->findBicycles();
		$productList = $moto->findMotorcycle($id);
		$user = $productList->belongsToUserProduct->belongsToUser;
		
		// change value for catalogs
		$catalog = new Catalog();
		$productList->brand = $catalog->getNameById($productList->brand)['name'];
		$productList->type = $catalog->getNameById($productList->type)['name'];
		$productList->city = $catalog->getNameById($productList->city)['name'];
		
		// pre($productList);
		return View::make('motorcycleShow', array('product' => $productList , 'user'=> $user ));

	}
	public function searchBicycles($id) {
		$bicycle = new Bicycle();
		// $productList = $product->findBicycles();
		$productList = $bicycle->brand()->model()->city()->new()->amount()->get();
				
		// pre($productList);
		return View::make('bicycleGalery', array('productList' => $productList));

	}

}
