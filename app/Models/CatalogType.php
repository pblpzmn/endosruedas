<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogType extends Model {

	protected $table = 'catalog_type';

	protected $fillable = array('id','name','description');

	protected $guarded = array('id');

		
}