<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;

class RegistrationController extends BaseController {


	/**
	* @var RegistrationForm
	*/
	private $registrationForm;

	/**
	* Constructor
	*
	* @param RegistrationForm $registrationForm
	*/
	function __construct(RegistrationForm $registrationForm)
	{
		$this->registrationForm = $registrationForm;

		$this->beforeFilter('guest');
	}


	/**
	 * Show a form for creating the user
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

	/**
	* Create a new Larabook user
	*
	* @return string
	**/

	public function store()
	{
		$this->registrationForm->validate(Input::all());

		$user = $this->execute(RegisterUserCommand::class);

		Auth::login($user);

		Flash::message('Glad to have you as a new larabook member!');

		return Redirect::home()->with('flash_message','Welcome aboard!');
	}
}