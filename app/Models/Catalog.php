<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model {

	protected $table = 'catalog';

	protected $fillable = array('id','catalog_type_id','name','description');

	protected $guarded = array('id');

	
	public function findByCatalogType($id){
		return Catalog::where('catalog_type_id', '=', $id)->orderBy('name', 'asc')->get();
//$query = $this;	
//		$query = $query->catalog_type_id($id);
//		return $query->orderBy('name', 'desc');
	}
	
	public function getNameById($id){
		return Catalog::find($id, array('name'));
//$query = $this;	
//		$query = $query->catalog_type_id($id);
//		return $query->orderBy('name', 'desc');
	}
	
	
}