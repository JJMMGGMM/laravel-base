<?php

/*
*
* Rutas de aplicación
*
*/

use Mews\Captcha\Captcha;

// Sección principal
Route::group(['middleware' => ['activated']], function () {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'InicioController@index'
    ]);

    Route::get('inicio', [
        'as' => 'inicio',
        'uses' => 'InicioController@index'
    ]);

    Route::get('ayuda', [
        'as' => 'ayuda',
        'uses' => 'AyudaController@index'
    ]);
});

// Sección ingreso, registro y recuperación
Route::get('ingresar', [
    'as' => 'ingresar.mostrar_frm_login',
    'uses' => 'Auth\AuthController@showLoginForm'
]);

Route::post('ingresar', [
    'as' => 'ingresar.realizar_login',
    'uses' => 'Auth\AuthController@login'
]);

Route::get('perfil/salir', [
    'as' => 'salir',
    'uses' => 'Auth\AuthController@logout'
]);

// Bloqueo registro
if (env('ALLOW_USER_REGISTRATION', true)) {
    Route::get('registro', [
        'as' => 'registro.mostrar_frm_registro',
        'uses' => 'Auth\AuthController@showRegistrationForm'
    ]);

    Route::post('registro', [
        'as' => 'registro.realizar_registro',
        'uses' => 'Auth\AuthController@register'
    ]);
} else {
    Route::match(['get','post'], 'registro', function () {
        return view('errors.404');
    });
}

// Sección perfil
Route::group(['middleware' => ['auth', 'activated']], function () {
    // Inicio
    Route::get('perfil', [
        'as' => 'perfil.index',
        'uses' => 'PerfilController@index'
    ]);

    // Alias
    Route::get('perfil/editar-alias', [
        'as' => 'perfil.editarAlias',
        'uses' => 'PerfilController@editarAlias'
    ]);

    Route::post('perfil/actualizar-alias', [
        'as' => 'perfil.actualizarAlias',
        'uses' => 'PerfilController@actualizarAlias'
    ]);

    // Correo
    Route::get('perfil/editar-correo', [
        'as' => 'perfil.editarCorreo',
        'uses' => 'PerfilController@editarCorreo'
    ]);

    Route::post('perfil/guardar-op-actualizar-correo', [
        'as' => 'perfil.guardarOpActualizarCorreo',
        'uses' => 'PerfilController@guardarOpActualizarCorreo'
    ]);

    Route::get('perfil/actualizar-correo/usuario={usuario_id}/correo={correo}/op={tipo_operacion_id}/token={token}', [
        'as' => 'perfil.actualizarCorreo',
        'uses' => 'PerfilController@actualizarCorreo'
    ]);

    // Contraseña
    Route::get('perfil/editar-contrasenia', [
        'as' => 'perfil.editarContrasenia',
        'uses' => 'PerfilController@editarContrasenia'
    ]);

    Route::post('perfil/guardar-op-actualizar-contrasenia', [
        'as' => 'perfil.guardarOpActualizarContrasenia',
        'uses' => 'PerfilController@guardarOpActualizarContrasenia'
    ]);

    Route::get('perfil/confirmar-contrasenia/usuario={usuario_id}/correo={correo}/op={tipo_operacion_id}/token={token}', [
        'as' => 'perfil.confirmarContrasenia',
        'uses' => 'PerfilController@confirmarContrasenia'
    ]);

    Route::post('perfil/actualizar-contrasenia', [
        'as' => 'perfil.actualizarContrasenia',
        'uses' => 'PerfilController@actualizarContrasenia'
    ]);

    // Borrado
    Route::get('perfil/borrar-usuario', [
        'as' => 'perfil.borrarUsuario',
        'uses' => 'PerfilController@borrarUsuario'
    ]);

    Route::post('perfil/guardar-op-eliminar-usuario', [
        'as' => 'perfil.guardarOpEliminarUsuario',
        'uses' => 'PerfilController@guardarOpEliminarUsuario'
    ]);

    Route::get('/perfil/borrar-cuenta/usuario={usuario_id}/correo={correo}/op={tipo_operacion_id}/token={token}', [
        'as' => 'perfil.eliminarUsuario',
        'uses' => 'PerfilController@eliminarUsuario'
    ]);

    // Confirmación usuario
    Route::get('perfil/guardar-op-confirmar-correo', [
        'as' => 'perfil.guardarOpConfirmarCorreo',
        'uses' => 'PerfilController@guardarOpConfirmarCorreo'
    ]);

    Route::get('perfil/confirmar-correo/usuario={usuario_id}/correo={correo}/op={tipo_operacion_id}/token={token}', [
        'as' => 'perfil.confirmarCorreo',
        'uses' => 'PerfilController@confirmarCorreo'
    ]);
});

// Reestablecer usuario
Route::get('perfil/reestablecer-usuario', [
    'as' => 'perfil.reestablecerUsuario',
    'uses' => 'PerfilController@reestablecerUsuario'
]);

Route::post('perfil/guardar-op-recuperar-usuario', [
    'as' => 'perfil.guardarOpRecuperarUsuario',
    'uses' => 'PerfilController@guardarOpRecuperarUsuario'
]);

Route::get('/perfil/recuperar-cuenta/usuario={usuario_id}/correo={correo}/op={tipo_operacion_id}/token={token}', [
    'as' => 'perfil.mostrarFrmRecuperarCuenta',
    'uses' => 'PerfilController@mostrarFrmrecuperarCuenta'
]);

Route::post('perfil/recuperar-usuario', [
    'as' => 'perfil.recuperarUsuario',
    'uses' => 'PerfilController@recuperarUsuario'
]);

// Captcha
Route::get(
    'generar-captcha/{config?}',
    function (Captcha $captcha, $config = 'inverse') {
        return $captcha->src($config);
    }
);
