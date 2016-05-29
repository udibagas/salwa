<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

	public function register(RegisterRequest $request)
    {
		$data 				= $request->all();
		$data['confirm'] 	= $request->password;
		$data['password'] 	= bcrypt($request->password);
		$data['user_status']= User::ROLE_MEMBER;
		$data['api_token']	= str_random(60);

		if ($request->hasFile('img')) {

            $file = $request->file('img');

            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/dirimg_user', $fileName);

            $data['img_user'] = 'uploads/dirimg_user/'.$fileName;

        }

        auth()->guard($this->getGuard())->login(User::create($data));
        return redirect($this->redirectPath());
    }

	public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

		$field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

        // $credentials = $this->getCredentials($request);
		$credentials = [
			$field		=> $request->email,
			// 'password'	=> crypt($request->password, 'mib'),
			'password'	=> $request->password,
			'active'	=> 'Y'
		];

        if (auth()->guard($this->getGuard())->attempt($credentials, $request->has('remember')))
		{
			// update data user
			$user = auth()->user();

			$user->update([
				'last_login'	=> date('Y-m-d H:i:s'),
				'login'			=> 1,
				'ip'			=> $_SERVER['REMOTE_ADDR']
			]);

            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
}
