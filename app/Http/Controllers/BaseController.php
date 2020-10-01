<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Picture;
class BaseController extends Controller {

	public $messagesView = null;
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		// esto se usa solo si no usamos blade layout
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
			
		}
	}
	
	public function getPictureMessage(Request $request) {

		$files = $request->file('files');;//Input::all();

		$images = new Picture();
		$messages = $images -> validateImages($files);
		$messagesView = null;
		if ($messages != null) {
			foreach ($messages->all('<li>:message</li>') as $message) {
				$this -> messagesView .= $message;
			}
		}
	}

	public function getProductMessage($productInstance, Request $request) {
		$input = $request->all();//Input::all();
		$messages = $productInstance -> validate($input);
		if ($messages != null) {
			foreach ($messages->all('<li>:message</li>') as $message) {
				$this -> messagesView .= $message;
			}
		}
	}

}