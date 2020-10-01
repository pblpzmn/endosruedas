<?php

class Email  {



	public static function validate($input = array()) {

		$messages = null;
		$validator = Validator::make($input, array('name'=> 'required', 'from'=> 'required|email', 'telephone' => 'required' ));

		if ($validator -> fails()) {
			$messages = $validator -> messages();
		}

		return $messages;
	}

}
