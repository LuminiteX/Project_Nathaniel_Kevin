<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse(Request $request)
    {
        // this is to make sure the remember me checkbox is already being selected
        if ($request->get('remember')) {
            //in here there is a custom remember me function to limit it into only 5 hours
            // this is in minutes
            $customRememberMe = 300;

            //now we will get the the token cookie key  
            $getTokenCookieKey = Auth::getRecallerName();

            //now we set up our customized remember me time
            Cookie::queue($getTokenCookieKey, Cookie::get($getTokenCookieKey), $customRememberMe);
        }

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        // this command to get remember me cookie name
        $cookieForRememberMe = Auth::getRecallerName();
        // to make sure the cookie of remember me being forgotten
        $cookieName = Cookie::forget($cookieForRememberMe);

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/')->withCookie($cookieName);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|email',
            'password' => 'required|string',
        ]);
    }
}
