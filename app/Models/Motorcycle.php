<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use \Validator;
use \Auth;

class Motorcycle extends Model {

	protected $table = 'motorcycles';

	protected $fillable = array('title','is_new','status', 'type', 'brand', 'model', 'year', 'city', 'amount', 'kilometer', 'cylinder_capacity', 'color', 'gas', 'speed', 'description');

	protected $guarded = array('id');

	public function validate($input = array()) {

		$messages = null;
		$validator = Validator::make($input, array('is_new'=> 'required' , 'type' => 'required', 'brand' => 'required', 'model' => 'required', 'year' => 'required|numeric|digits:4', 'city' => 'required|numeric', 'cylinder_capacity' => 'required|numeric', 'kilometer' => 'numeric', 'speed' => 'numeric', 'gas' => 'numeric', 'color' => 'alpha', 'amount' => 'required|numeric', 'description' => '' ));

		if ($validator -> fails()) {
			$messages = $validator -> messages();
		}

		return $messages;
	}
	

	// public function findMotorcycles($input = array()) {
// 
		// // return $all = Motorcycle::with(array('product','user'))->get();
// 	
	// }

	public function insertMotorcicle($input = array()) {
		
		$input['status'] = Constant::ACTIVE;
		// saving motorcycles
		$motrocycle = Motorcycle::create($input);
		$input['product_id'] = $motrocycle->id;
		// saving images

		$pictures = new Picture();
		
		$pictures -> upload($input['files'], Constant::MOTORCYCLE_NAME);
		$input['type'] = Constant::MOTORCYCLE;
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
		$input['status'] = Constant::ACTIVE;

		// saving motorcycle
		$motorcycle = Motorcycle::find($input['id'] );
		$motorcycle->title = $input['title'];
		$motorcycle->is_new = $input['is_new'];
		$motorcycle->status = $input['status'];
		$motorcycle->type = $input['type'];
		$motorcycle->brand = $input['brand'];
		$motorcycle->model = $input['model'];
		$motorcycle->year = $input['year'];
		$motorcycle->city = $input['city'];
		
//		$motorcycle->brake = $input['brake'];
//		$motorcycle->size = $input['size'];
		$motorcycle->amount = $input['amount'];
		$motorcycle->kilometer = $input['kilometer'];
		$motorcycle->cylinder_capacity = $input['cylinder_capacity'];
		$motorcycle->color = $input['color'];
		$motorcycle->gas = $input['gas'];
		$motorcycle->speed = $input['speed'];
		$motorcycle->description = $input['description'];
		$motorcycle->save();
//		pre($motorcycle,false);
//		pre($motorcycle['original'],false);
//		pre($input);
		$input['product_id'] = $motorcycle->id;
		
		// saving images
		$pictures = new Picture();
		$pictures -> upload($input['files'], Constant::MOTORCYCLE_NAME);
		$input['type'] = Constant::MOTORCYCLE;
		foreach ($pictures->getPath() as $path) {
			$input['path'] = $path;
			Picture::create($input);
		}
		$input['user_id'] = Auth::id();
		//$product = UserProduct::create($input);
		
	}

 	public function hasPicture() {
        return $this->hasMany('App\Models\Picture','product_id')->whereType(Constant::MOTORCYCLE)->get();
    }
    
    public function belongsToUserProduct() {
    	return $this->belongsTo('App\Models\UserProduct', 'id', 'product_id')->whereType(Constant::MOTORCYCLE);	
    }
    
	public function findMotorcyclesCreateQuery($input = array()) {

		return $all = Motorcycle::with(array('hasPicture'))
		->where('status', '=', Constant::ACTIVE);
		// ->get();
	
	}
		
	public function findPaginatedMotorcycles($input = array()) {
//		return $this->findMotorcyclesCreateQuery($input)->paginate(Constant::GALERY_PAGINATION);

		$query = $this;	
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
	}
    
    public function findMotorcycle($id) {
		return Motorcycle::find($id);
		//pre($bicycle->hasPicture());
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
