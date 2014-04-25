<?php

class LoginController extends BaseController {

	protected $layout = 'layouts.login';

	public function index()
	{
		$this->layout->content = View::make('login.form', array('username' => Input::get('username')));
	}

	public function process()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'username'    => 'required', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:8' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// Get language validation using English as default
		/*$messages = [
			'username.required' => Lang::get('app.login.usernameRequired', Lang::get('validation.required') ),
			'password.required' => Lang::get('app.login.passwordRequired', Lang::get('validation.required') ),
			'password.alphaNum' => Lang::get('app.login.passwordAlphaNum', Lang::get('validation.alphaNum') ),
			'password.min' => Lang::get('app.login.passwordMin', Lang::get('validation.min') ),
		];*/

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails())
		{
			return Redirect::route('login.index')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		}
		else
		{
			// create our user data for the authentication
			$userdata = array(
				'username'    => Input::get('username'),
				'password'    => Input::get('password'),
			);

			// attempt to do the login
			if (Auth::attempt($userdata))
			{
				// validation successful!
				// redirect them to the secure section or whatever
				return Redirect::intended(route('calendar.index'));
				
			}
			else
			{
				// validation not successful, send back to form
				return Redirect::route('login.index')->withErrors(array('username' => Lang::get('app.login.error') ));
			}

		}

	}

	public function lang($lang)
	{
		Session::put('lang', $lang);
		return Redirect::route('login.index');
	}

}