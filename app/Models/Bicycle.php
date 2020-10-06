<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use \Validator;
use \Auth;


class Bicycle extends Model {

	protected $table = 'bicycles';

	protected $fillable = array('title','is_new','status', 'type', 'brand', 'model', 'year', 'city', 'brake','size', 'speed','amount', 'description');

	protected $guarded = array('id');

	public function validate($input = array()) {

		$messages = null;
		$validator = Validator::make($input, array( 'is_new'=> 'required' , 'type' => 'required', 'brand' => 'required', 'model' => 'required', 'year' => 'required|numeric|digits:4', 'city' => 'required|numeric', 'amount' => 'required|numeric', 'description' => '' ));

		if ($validator -> fails()) {
			$messages = $validator -> messages();
		}

		return $messages;
	}
	

	public function insertBicicle($input = array()) {
		// pre($input);
		// saving products
		//$input['status'] = Constant::ACTIVE;

		// saving bicycle
		$bicycle = Bicycle::create($input);
		$input['product_id'] = $bicycle->id;
		
		// saving images
		$pictures = new Picture();
		$pictures -> upload($input['files'], Constant::BICYCLE_NAME);
		$input['type'] = Constant::BICYCLE;
		foreach ($pictures->getPath() as $path) {
			$input['path'] = $path;
			Picture::create($input);
		}
		$input['user_id'] = Auth::id();
		$product = UserProduct::create($input);
		
	}
	
	public function edit($input = array()) {
		// pre($input);
		// saving products
		//$input['status'] = Constant::ACTIVE;

		// saving bicycle
		$bicycle = Bicycle::find($input['id'] );
		$bicycle->title = $input['title'];
		$bicycle->is_new = $input['is_new'];
		$bicycle->status = $input['status'];
		$bicycle->type = $input['type'];
		$bicycle->brand = $input['brand'];
		$bicycle->model = $input['model'];
		$bicycle->year = $input['year'];
		$bicycle->city = $input['city'];
		$bicycle->brake = $input['brake'];
		$bicycle->size = $input['size'];
		$bicycle->speed = $input['speed'];
		$bicycle->amount = $input['amount'];
		$bicycle->description = $input['description'];
		$bicycle->save();
		
//		pre($bicycle,false);
//		pre($bicycle['original'],false);
//		pre($input);
		$input['product_id'] = $bicycle->id;
		
		// saving images
		$pictures = new Picture();
		$pictures -> upload($input['files'], Constant::BICYCLE_NAME);
		$input['type'] = Constant::BICYCLE;
		foreach ($pictures->getPath() as $path) {
			$input['path'] = $path;
			Picture::create($input);
		}
		$input['user_id'] = Auth::id();
		//$product = UserProduct::create($input);
		
	}

 	public function hasPicture() {
 		$picture = new Picture();
        return $this->hasMany('App\Models\Picture', 'product_id')->whereType(Constant::BICYCLE)->get();
 		//return $picture->findByProductId($this->id);
    }

    public function belongsToUserProduct() {
    	return $this->belongsTo('App\Models\UserProduct', 'id', 'product_id')->whereType(Constant::BICYCLE);;	
    }
    

	public function findBicyclesCreateQuery($input = array()) {
		return $all = Bicycle::with(array('hasPicture'))
		->where('status', '=', Constant::ACTIVE);
		// ->get(); // get runs the query
	}
	
	public function findPaginatedBicycles($input = array()) {
		// return $this->findBicyclesCreateQuery()->paginate(Constant::GALERY_PAGINATION);
		$query = $this;	
		//$query = $query->status( Constant::ACTIVE );	
		if(!empty($input['brand'])){
			$query = $query->brand($input['brand']);	
		}
		if(!empty($input['model'])){
			$query = $query->model($input['model']);	
		}
		if(!empty($input['city'])){
			$query = $query->city($input['city']);	
		}
		if(!empty($input['is_new'])){
			$query = $query->new($input['is_new']);	
		}
		if(!empty($input['amount'])){
			$query = $query->amount($input['amount']);	
		}	
		// $this->brand("shi")->paginate(Constant::GALERY_PAGINATION);
		return $query->orderBy('created_at', 'desc')->paginate(Constant::GALERY_PAGINATION);
		$queries = DB::getQueryLog();
		$last_query = end($queries);
		pre($last_query);
		
	}
	
	public function findBicycle($id=0) {
		$bicycle = Bicycle::find($id);
		//pre($bicycle->hasPicture());

		return $bicycle ;
		
		
//		return DB::table('bicycles')
//		 ->select('*' 
//		  )
//		->leftJoin('user_product', function($join)
//        {
//            $join->on('bicycles.id' , '=',  'user_product.product_id'   )
//                 ->where('user_product.type', '=', Constant::BICYCLE);
//        })
//        ->leftJoin('users', function($join)
//        {
//            $join->on('users.id', '=', 'user_product.user_id' );
//                 
//        })->where('bicycles.id', '=', $id)->get();
//        $queries = DB::getQueryLog();
//		pre($queries);
		
		
		// ->with(array('hasPicture'));
	}
	
	public function scopeBrand($query,$condition) {
	  return $query->whereBrand($condition);
	}
	
	public function scopeModel($query,$condition) {
	  return $query->whereModel($condition);
	}
	public function scopeCity($query,$condition) {
	  return $query->whereCity($condition);
	}
	public function scopeNew($query,$condition) {
	  return $query->whereIsNew( $condition);
	}
	public function scopeAmount($query,$condition) {
	  return $query->whereAmount( $condition);
	}

	
}