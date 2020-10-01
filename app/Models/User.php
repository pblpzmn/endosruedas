<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\Constant;
use Validator;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;


  	public function comments()
     {
         return $this->hasMany('Comment');
     }

	// protected $softDelete = true; //esto no borra de la base pero hay que crear un campo extra

	protected $fillable = array('name', 'email', 'password', 'phone', 'cell_phone');

	protected $guarded = array('id');


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier() {
		return $this -> getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword() {
		return $this -> password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail() {
		return $this -> email;
	}

	public static function validate($input = array(), $action = null) {
		if ($action != null) {
			$messages = null;
			if ($action == Constant::CREATE) {
				$emailValidation = 'required|email|unique:users';
				$passwordValidation = 'Required|AlphaNum|min:4|Confirmed';
				$password_confirmation = 'Required|AlphaNum|min:4';
			}

			if ($action == Constant::UPDATE) {
				// 				print_r($input); die;
				$emailValidation = 'sometimes|email|unique:users';
				$passwordValidation = 'sometimes|min:4|Confirmed';
				$password_confirmation = 'sometimes|min:4';
			}
			$validator = Validator::make($input,
			// array(
			// 'name' => $input['name'],
			// 'password' => $input['password'],
			// 'email' => $input['email']
			// ),
			array('name' => 'required', 'password' => $passwordValidation, 'password_confirmation' => $password_confirmation, 'email' => $emailValidation, ));

			if ($validator -> fails()) {
				$messages = $validator -> messages();
			}
		} else {
			$messages = "definir una accion";
		}
		return $messages;
	}

}
