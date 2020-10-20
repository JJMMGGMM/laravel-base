<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model implements
    AuthenticatableContract,
    AuthorizableContract
{
    use Authenticatable, Authorizable;
    use SoftDeletes;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    const DELETED_AT = 'eliminacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alias',
        'correo',
        'contra',
        'creacion',
        'modificacion',
        'activacion',
        'eliminacion'
    ];

    protected $dates = [
        'creacion',
        'modificacion',
        'activacion',
        'eliminacion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'contra',
        'envios',
        'bloqueo_envios',
        'reintentos_ingreso',
        'bloqueo_ingreso',
        'token_sesion'
    ];

    public $timestamps = false;

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->contra;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->token_sesion;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->token_sesion = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'token_sesion';
    }
}
