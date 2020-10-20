<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Usuario;
use Validator;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'alias' => 'required|max:50',
            'correo' => 'required|email|max:50|unique:usuarios',
            'contra' => 'required|min:6|max:64|same:confirmar_contra',
            'confirmar_contra' => 'required|min:6|max:64',
            'detalle_captcha' => 'required|captcha|min:6|max:8'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'alias' => $data['alias'],
            'correo' => $data['correo'],
            'contra' => bcrypt($data['contra']),
            'envios' => 5,
            'reintentos_ingreso' => 10,
            'creacion' => date("Y-m-d H:i:s")
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'correo';
    }


    /*
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only($this->loginUsername(), 'contra');
    }


    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $view = property_exists($this, 'loginView')
                    ? $this->loginView : 'auth.authenticate';

        if (view()->exists($view)) {
            return view($view);
        }

        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        return $this->login($request);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $credentials = $this->getCredentials($request);

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('recordar'))) {
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

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'contra' => 'required', 'detalle_captcha' => 'required|captcha|min:6|max:8'
        ]);
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  bool  $throttles
     * @return \Illuminate\Http\Response
     */
    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }

        $usuario = Usuario::select(
            'usuarios.usuario_id',
            'usuarios.reintentos_ingreso',
            'usuarios.bloqueo_ingreso'
        )
        ->where('usuarios.correo', $request->correo)
        ->orderBy('usuarios.usuario_id', 'asc')
        ->first();

        $usuario->reintentos_ingreso = 10;
        $usuario->bloqueo_ingreso = null;
        $usuario->save();

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $usuario = Usuario::select(
            'usuarios.usuario_id',
            'usuarios.reintentos_ingreso',
            'usuarios.bloqueo_ingreso'
        )
        ->where('usuarios.correo', $request->correo)
        ->orderBy('usuarios.usuario_id', 'asc')
        ->first();

        if (!$usuario) {
            return redirect()
                ->back()
                ->withInput($request->except('contra'))
                ->withErrors([
                    $this->loginUsername() => $this->getFailedLoginMessage()
                ]);
        }

        // check remaining tries
        $reintentos_restantes = $usuario->reintentos_ingreso;

        if (!$reintentos_restantes || $reintentos_restantes == 0) {
            $limite_bloqueo = $usuario->bloqueo_ingreso;
            $hoy = date('Y-m-d H:i:s');

            if (!$limite_bloqueo) {
                $usuario->bloqueo_ingreso = date('Y-m-d H:i:s', strtotime('+ 1 hour'));
                $usuario->save();

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Reintentos de ingreso agotados, reintente en una hora ' .
                        'o si el problema persiste consulte a soporte'
                    );
            }

            if (strtotime($hoy) > strtotime($limite_bloqueo)) {
                $usuario->reintentos_ingreso = 10;
                $usuario->bloqueo_ingreso = null;
                $usuario->save();
            }

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Reintentos de envío agotados, reintente en una hora ' .
                    'o si el problema persiste consulte a soporte'
                );
        } else {
            $usuario->reintentos_ingreso = $reintentos_restantes - 1;
            $usuario->save();
        }

        return redirect()
            ->back()
            ->withInput($request->except('contra'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.failed')
                ? Lang::get('auth.failed')
                : 'These credentials do not match our records.';
    }
}
