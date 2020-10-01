<?php
namespace App\Models;

use \Image;
use Illuminate\Filesystem\Filesystem;

use \Validator;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model {
	/*seems like Images class is already taken*/

	protected $table = 'images';

	protected $fillable = array('product_id','type', 'path');

	protected $guarded = array('id');

	private $imgPaths = array();

	public function validateImages($files = array()) {
		$messages = null;
		$validator = Validator::make($files, array('picture1' => 'mimes:jpeg,bmp,png|max:4000', 'picture2' => 'mimes:jpeg,bmp,png|max:4000', 'picture3' => 'mimes:jpeg,bmp,png|max:4000'));

		if ($validator -> fails()) {
			$messages = $validator -> messages();
		}

		return $messages;

	}

	/**
	 * Upload files to server
	 * @param unknown $input
	 */
	public function upload($files, $type) {
		// include composer autoload
		// require 'vendor/autoload.php';
		$fs = new Filesystem();
		if( !$fs->exists( 'uploads/'.$type ) ){
			mkdir( 'uploads/'.$type );
		}
		
		$destinationPath = 'uploads/'.$type."/" . str_random(8);
		foreach ($files as $key => $file) {
			if ($file == null) {
				continue;
			}
			if( !$fs->exists($destinationPath) ){
				mkdir($destinationPath);
			}
			$filename = $file -> getClientOriginalName();
			Image::make($file->getRealPath())->resize(700, 500)->save($destinationPath . '/' . $filename);

			//pre($filename, false);
			//pre($destinationPath . '/' . $filename."_thumbnail");

			Image::make($file->getRealPath())->resize(300, 250)->save($destinationPath . '/' . "thumbnail_".$filename);
			$this -> imgPaths[$key] = $destinationPath . '/' . $filename;
			// 			$file->resize(320, 240);
			//$extension =$file->getClientOriginalExtension();
			//$upload_success = $file -> move($destinationPath, $filename);
		}

	}

	public function getPath() {
		return $this -> imgPaths;
	}

}
