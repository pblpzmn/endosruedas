<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class UserProduct extends Model {

	protected $fillable = array('user_id', 'product_id' , 'type');

	protected $guarded = array('id');
	
	protected $table = 'user_product';


 	public function hasBicycle() {
        return $this->hasMany('Bicycle','id');
    }
	
	public function hasMotorcycle() {
        return $this->hasMany('Motorcycle','id');
    }
    
	public function belongsToUser() {
    	return $this->belongsTo('App\Models\User', 'user_id' , 'id' );	
    }

	
	public function findUserProduct($input = array()) {

		 return  DB::table('user_product')
		 ->select('user_product.id as id', 'user_product.product_id as product_id', 'user_product.type as type' , 
		 'motorcycles.id as moto',
		 'bicycles.id as bici',  
		 'motorcycles.brand as motoBrand', 
		 'bicycles.brand as bicyBrand',
		 'motorcycles.model as motoModel', 
		 'bicycles.model as bicyModel',
		 'bicycles.updated_at as bicyDate' ,
		 'motorcycles.updated_at as motoDate' )
        ->leftJoin('motorcycles', function($join)
        {
            $join->on('user_product.product_id', '=', 'motorcycles.id')
                 ->where('user_product.type', '=', Constant::MOTORCYCLE);
        })
		->leftJoin('bicycles', function($join)
        {
            $join->on('user_product.product_id', '=', 'bicycles.id')
                 ->where('user_product.type', '=', Constant::BICYCLE);
        })
        ->where('user_id', '=', Auth::user()->id);

// ->get();

/*       // DE ESTA FORMA NO PAGINA
		 return $results = DB::select( DB::raw("
				select up.id, up.type, m.id moto,b.id bici
				from user_product up
				LEFT JOIN motorcycles m ON (up.id=m.id AND up.type=:motorcycle )
				LEFT JOIN bicycles b ON (up.id=b.id AND up.type=:bicycle )
				WHERE user_id = :user
		
		"), array(
		   'user' => Auth::user()->id,
		   'motorcycle' => Constant::MOTORCYCLE,
		   'bicycle' => Constant::BICYCLE,
		 ));
		pre($results);
 */

		$queries = DB::getQueryLog();
		pre($queries);
	
	}

	public function publicationUserList($input = array()) {
		 return $this->findUserProduct()->paginate(Constant::GALERY_PAGINATION);
	}
	
}
