<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'captcha'              => 'Campo :attribute es incorrecto.',
    'accepted'             => 'Campo :attribute debe ser aceptado.',
    'active_url'           => 'Campo :attribute no es una URL válida.',
    'after'                => 'Campo :attribute debe ser una fecha después de :date.',
    'alpha'                => 'Campo :attribute solo debe contener letras.',
    'alpha_dash'           => 'Campo :attribute solo debe contener letras, números y guiones.',
    'alpha_num'            => 'Campo :attribute solo debe contener letras y números.',
    'array'                => 'Campo :attribute debe ser un arreglo.',
    'before'               => 'Campo :attribute debe ser una fecha antes de :date.',
    'between'              => [
        'numeric' => 'Campo :attribute debe estar entre :min - :max.',
        'file'    => 'Campo :attribute debe estar entre :min - :max kilobytes.',
        'string'  => 'Campo :attribute debe estar entre :min - :max caracteres.',
        'array'   => 'Campo :attribute debe tener entre :min y :max elementos.',
    ],
    'boolean'               => 'Campo :attribute debe ser verdadero o falso.',
    'confirmed'             => 'Campo de confirmación de :attribute no coincide.',
    'date'                  => 'Campo :attribute no es una fecha válida.',
    'date_format'           => 'Campo :attribute no corresponde con el formato :format.',
    'different'             => 'Campo :attribute y :other deben ser diferentes.',
    'digits'                => 'Campo :attribute debe ser de :digits dígitos.',
    'digits_between'        => 'Campo :attribute debe tener entre :min y :max dígitos.',
    'dimensions'            => 'Campo :attribute no tiene una dimensión válida.',
    'distinct'              => 'Campo :attribute tiene un valor duplicado.',
    'email'                 => 'Campo :attribute es inválido.',
    'exists'                => 'Campo :attribute seleccionado es inválido.',
    'file'                  => 'Campo :attribute debe ser archivo.',
    'filled'                => 'Campo :attribute es requerido.',
    'image'                 => 'Campo :attribute debe ser imagen.',
    'in'                    => 'Campo :attribute seleccionado es inválido.',
    'in_array'              => 'Campo :attribute no existe en :other.',
    'integer'               => 'Campo :attribute debe ser entero.',
    'ip'                    => 'Campo :attribute debe ser una dirección IP válida.',
    'json'                  => 'Campo :attribute debe ser una cadena JSON válida.',
    'max'                   => [
        'numeric' => 'Campo :attribute debe ser menor que :max.',
        'file'    => 'Campo :attribute debe ser menor que :max kilobytes.',
        'string'  => 'Campo :attribute debe ser menor que :max caracteres.',
        'array'   => 'Campo :attribute puede tener hasta :max elementos.',
    ],
    'mimes'                 => 'Campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes'             => 'Campo :attribute debe ser un archivo de tipo: :values.',
    'min'                   => [
        'numeric' => 'Campo :attribute debe tener al menos :min.',
        'file'    => 'Campo :attribute debe tener al menos :min kilobytes.',
        'string'  => 'Campo :attribute debe tener al menos :min caracteres.',
        'array'   => 'Campo :attribute debe tener al menos :min elementos.',
    ],
    'not_in'                => 'Campo :attribute seleccionado es invalido.',
    'numeric'               => 'Campo :attribute debe ser número.',
    'present'               => 'Campo :attribute debe estar presente.',
    'regex'                 => 'Campo :attribute es inválido.',
    'required'              => 'Campo :attribute es requerido.',
    'required_if'           => 'Campo :attribute es requerido cuando :other es la opción :value.',
    'required_unless'       => 'Campo :attribute es requerido a menos que :other esté presente en :values.',
    'required_with'         => 'Campo :attribute es requerido cuando :values está presente.',
    'required_with_all'     => 'Campo :attribute es requerido cuando :values está presente.',
    'required_without'      => 'Campo :attribute es requerido cuando :values no está presente.',
    'required_without_all'  => 'Campo :attribute es requerido cuando :values no está presente.',
    'same'                  => 'Campo :attribute y :other deben coincidir.',
    'size'                  => [
        'numeric' => 'Campo :attribute debe ser :size.',
        'file'    => 'Campo :attribute debe tener :size kilobytes.',
        'string'  => 'Campo :attribute debe tener :size caracteres.',
        'array'   => 'Campo :attribute debe contener :size elementos.',
    ],
    'string'                => 'Campo :attribute debe ser una cadena.',
    'timezone'              => 'Campo :attribute debe ser una zona horaria válida.',
    'unique'                => 'Campo :attribute ya está registrado.',
    'url'                   => 'Campo :attribute es inválido.',
    'uploaded'              => 'Campo :attribute no ha podido ser cargado.',
    //regla personal:
    'empty_if' => 'Campo :attribute debe ser vacío cuando :other es la opción :value.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'detalle_titulo'=>'título',
        'detalle_resumen'=>'resumen',
        'detalle_url'=>'URL',
        'detalle_imagen'=>'imagen',

        'detalle_descripcion'=>'descripción',
        'detalle_valor'=>'valor',

        'detalle_publicacion'=>'publicación',

        'detalle_vigencia'=>'vigencia',
        'detalle_valor_a'=>'valor a',
        'detalle_valor_b'=>'valor b',

        'correo' => 'correo',
        'contra' => 'contraseña',

        'alias' => 'alias',
        'confirmar_contra' => 'confirmar contraseña',
        
        'detalle_captcha' => 'captcha',

        'detalle_nombre' => 'nombre',
        'detalle_correo' => 'correo',
        'detalle_motivo' => 'motivo',
        'detalle_mensaje' => 'mensaje'
    ],

];
