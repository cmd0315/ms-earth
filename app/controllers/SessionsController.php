<?php
use BCD\Forms\LoginForm;
use Laracasts\Validation\FormValidationException;

class SessionsController extends \BaseController {

	/**
	* @var LoginForm $loginForm
	*/
	private $loginForm;

	/**
	* Constructor
	*
	* @param LoginForm $loginForm
	*/
	function __construct(LoginForm $loginForm) {
		$this->loginForm = $loginForm;
		$this->beforeFilter('guest', ['except' => 'destroy']);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('signin', ['pageTitle' => 'Admin Access']);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('username', 'password');

		// Check form for error
		try {
			$this->loginForm->validate(Input::all());
		}
		catch(FormValidationException $error) {
			return Redirect::back()->withInput()->withErrors($error->getErrors());
		}


		$remember = (Input::has('remember')) ? true : false;

		if( !(Auth::attempt($input, $remember)) ){
			return  Redirect::route('sessions.create')
					->with('global-error', 'Wrong username or password');
		}

		//Redirect to intended page
		return Redirect::route('dashboard')
				->with('global', 'You are now logged in!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::route('home')->with('global', "You have been logged out.");
	}


}
