<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Email
use Redirect
class ContactUsController extends BaseController {

	public function contact_us(Request $request) {

		$input = $request->all();
		$messages = Email::validate($input);

		//         print_r($messages); die;
		if ($messages == null) {
			$subject = 'Nuevo mensaje';//$input['subject'];
	    	$toEmail = array('elpablopazmino@gmail.com'); //$input['toEmail'];
	    	$toName = 'nuevo usuario';//$input['toName'];
			Mail::send(  array('html' =>'emails.contact_buyer'), $input, function($message) use ($toEmail, $toName,  $subject)
	    	{
		        $message->to($toEmail, $toName)
		        ->subject($subject);
	    	});
			return Redirect::to('contactanos') -> with(Constant::MESSAGE_SUCCESS, 'Envío de correo exitoso, un asesor de ventas se contactará con usted');	
		} else {
			$messagesView = null;
			foreach ($messages->all('<li>:message</li>') as $message) {
				$messagesView .= $message;
			}
			$request->flash();
			// to show same data on inputs if fails
			return Redirect::to('contactanos') -> with(Constant::MESSAGE_ERROR, $messagesView) -> withInput();
		}
	}

}
