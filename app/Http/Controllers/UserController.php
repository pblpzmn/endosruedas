<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserProduct;

use Validator;
use Auth;
use Hash;
use Redirect;
use Mail;
use View;
use App\Models\Constant;

class UserController extends BaseController {

	/*
	 * Validates registration
	 */
	public function create(Request $request) {

		$input = $request->all();//Input::all();
		$messages = User::validate($input, Constant::CREATE);

		//         print_r($messages); die;
		if ($messages == null) {
			unset($input['password_confirmation']);
			$input['password'] = Hash::make($input['password']);
			$user = User::create($input);
			Auth::login($user);
			
			$subject = 'Registro de Usuario';//$input['subject'];
	    	$toEmail = $user->email; //$input['toEmail'];
	    	$toName = $user->name;//$input['toName'];
			Mail::send(  array('html' =>'emails.register'), $input, function($message) use ($toEmail, $toName,  $subject)
	    	{
		        $message->to($toEmail, $toName)
		        ->subject($subject);
	    	});
			
			
			// auto login
			return Redirect::to('perfil') -> with(Constant::MESSAGE_SUCCESS, 'Usuario Registrado');
		} else {
			$messagesView = null;
			foreach ($messages->all('<li>:message</li>') as $message) {
				$messagesView .= $message;
			}
			$request->flash();
			// to show same data on imputs if fails
			return Redirect::to('registro') -> with(Constant::MESSAGE_ERROR, $messagesView) -> withInput();
		}
	}

	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}

	public function login(Request $request) {
		$email = $request->input('email');
		$password = $request->input('password');
		// la función attempt se encarga automáticamente se hacer la encriptación de la password para ser comparada con la que esta en la base de datos.
		if (Auth::attempt(array('email' => $email, 'password' => $password), true)) {
			return Redirect::to('perfil');
		} else {

			return Redirect::to('login') -> with(Constant::MESSAGE_ERROR, 'Ingreso invalido: ');
		}

	}

	public function update(Request $request) {

		$input = $request->all();
		unset($input['email']);
		//email should not be edited
		if (!isset($input['change_password'])) {
			unset($input['password']);
			unset($input['password_confirmation']);
		}

		$messages = User::validate($input, Constant::UPDATE);

		if ($messages == null) {
			unset($input['password_confirmation']);
			unset($input['change_password']);
			if (isset($input['password'])) {
				$input['password'] = Hash::make($input['password']);
			}
			$user = User::find(Auth::user() -> id);
			$user -> update($input);
			return Redirect::to('perfil') -> with(Constant::MESSAGE_SUCCESS, 'Usuario actualizado');

		} else {
			$messagesView = null;
			foreach ($messages->all('<li>:message</li>') as $message) {
				$messagesView .= $message;
			}
			$request->flash();
			// to show same data on imputs if fails
			return Redirect::to('perfil') -> with(Constant::MESSAGE_ERROR, $messagesView) -> withInput();
		}
	}
	public function publicationList(){
		$userProduct = new UserProduct();
		$userList = $userProduct->publicationUserList();
		// pre($userList);
		return View::make('publicationList', array('userList' => $userList ));
		
	}

}
