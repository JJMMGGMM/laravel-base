<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    protected $table = 'operaciones';
    protected $primaryKey = 'operacion_id';

    protected $fillable = [
        'usuario_id',
        'tipo_operacion_id',
        'correo',
        'token',
        'expiracion'
    ];

    protected $guarded = [
        'operacion_id'
    ];

    protected $dates = [
        'expiracion'
    ];

    public $timestamps = false;
}
