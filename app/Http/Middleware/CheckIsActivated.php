<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Usuario;

class CheckIsActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() == true) {
            $creacion = strtotime(Auth::user()->creacion);
            $expiracion = strtotime(date('Y-m-d H:i:s', strtotime(Auth::user()->creacion . ' + 7 days')));
            $activacion = Auth::user()->activacion;
            $hoy = strtotime(date('Y-m-d H:i:s'));

            if (!$activacion) {
                if ($hoy < $expiracion) {
                    Session::flash(
                        'warning', 'Antes de poder usar y acceder
                        a todas las funciones debe activar su cuenta,
                        de contrario será eliminada en 7 días'
                    );
                } else {
                    $usuario = Usuario::select(
                        'usuarios.usuario_id'
                    )
                    ->where('usuarios.usuario_id', Auth::user()->usuario_id)
                    ->orderBy('usuarios.usuario_id', 'asc')
                    ->first();

                    if ($usuario == null) {
                        Auth::logout();

                        Session::flash(
                            'error', 'Hubo un problema con la cuenta, inicio
                            de sesión cancelado'
                        );

                        return redirect('/');
                    } else {
                        $usuario->alias = '-----';
                        $usuario->contra = '-----';
                        $usuario->token_sesion = '-----';
                        $usuario->save();

                        Auth::logout();

                        Session::flash(
                            'error', 'La cuenta ha sido borrada porque
                            ha caducado'
                        );

                        return redirect('/');
                    }
                }
            }
        }
        return $next($request);
    }
}
