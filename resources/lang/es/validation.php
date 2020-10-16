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

    'accepted' => 'El :atributo debe ser be accepted.',
    'active_url' => 'El :atributo is not a valid URL.',
    'after' => 'El :atributo debe ser be a date after :date.',
    'after_or_equal' => 'El :atributo debe ser be a date after or equal to :date.',
    'alpha' => 'El :atributo may only contain letters.',
    'alpha_dash' => 'El :atributo may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'El :atributo may only contain letters and numbers.',
    'array' => 'El :atributo debe ser be an array.',
    'before' => 'El :atributo debe ser be a date before :date.',
    'before_or_equal' => 'El :atributo debe ser be a date before or equal to :date.',
    'between' => [
        'numeric' => 'El :atributo debe ser be between :min and :max.',
        'file' => 'El :atributo debe ser be between :min and :max kilobytes.',
        'string' => 'El :atributo debe ser be between :min and :max characters.',
        'array' => 'El :atributo debe ser have between :min and :max items.',
    ],
    'boolean' => 'El :atributo campo debe ser be true or false.',
    'confirmed' => 'El :atributo confirmation does not match.',
    'date' => 'El :atributo is not a valid date.',
    'date_equals' => 'El :atributo debe ser be a date equal to :date.',
    'date_format' => 'El :atributo does not match El format :format.',
    'different' => 'El :atributo and :oElr debe ser be different.',
    'digits' => 'El :atributo debe ser be :digits digits.',
    'digits_between' => 'El :atributo debe ser be between :min and :max digits.',
    'dimensions' => 'El :atributo has invalid image dimensions.',
    'distinct' => 'El :atributo campo has a duplicate value.',
    'email' => 'El :atributo debe ser be a valid email address.',
    'ends_with' => 'El :atributo debe ser end with one of El following: :values.',
    'exists' => 'El selected :atributo is invalid.',
    'file' => 'El :atributo debe ser be a file.',
    'filled' => 'El :atributo campo debe ser have a value.',
    'gt' => [
        'numeric' => 'El :atributo debe ser be greater than :value.',
        'file' => 'El :atributo debe ser be greater than :value kilobytes.',
        'string' => 'El :atributo debe ser be greater than :value characters.',
        'array' => 'El :atributo debe ser have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'El :atributo debe ser be greater than or equal :value.',
        'file' => 'El :atributo debe ser be greater than or equal :value kilobytes.',
        'string' => 'El :atributo debe ser be greater than or equal :value characters.',
        'array' => 'El :atributo debe ser have :value items or more.',
    ],
    'image' => 'El :atributo debe ser be an image.',
    'in' => 'El selected :atributo is invalid.',
    'in_array' => 'El :atributo campo does not exist in :oElr.',
    'integer' => 'El :atributo debe ser be an integer.',
    'ip' => 'El :atributo debe ser be a valid IP address.',
    'ipv4' => 'El :atributo debe ser be a valid IPv4 address.',
    'ipv6' => 'El :atributo debe ser be a valid IPv6 address.',
    'json' => 'El :atributo debe ser be a valid JSON string.',
    'lt' => [
        'numeric' => 'El :atributo debe ser be less than :value.',
        'file' => 'El :atributo debe ser be less than :value kilobytes.',
        'string' => 'El :atributo debe ser be less than :value characters.',
        'array' => 'El :atributo debe ser have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'El :atributo debe ser be less than or equal :value.',
        'file' => 'El :atributo debe ser be less than or equal :value kilobytes.',
        'string' => 'El :atributo debe ser be less than or equal :value characters.',
        'array' => 'El :atributo debe ser not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'El :atributo may not be greater than :max.',
        'file' => 'El :atributo may not be greater than :max kilobytes.',
        'string' => 'El :atributo may not be greater than :max characters.',
        'array' => 'El :atributo may not have more than :max items.',
    ],
    'mimes' => 'El :atributo debe ser be a file of type: :values.',
    'mimetypes' => 'El :atributo debe ser be a file of type: :values.',
    'min' => [
        'numeric' => 'El :atributo debe ser be at least :min.',
        'file' => 'El :atributo debe ser be at least :min kilobytes.',
        'string' => 'El :atributo debe ser be at least :min characters.',
        'array' => 'El :atributo debe ser have at least :min items.',
    ],
    'not_in' => 'El atributo :seleccionado es inválido.',
    'not_regex' => 'El :atributo format es inválido.',
    'numeric' => 'El :atributo debe ser be un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El :atributo campo debe ser present.',
    'regex' => 'El :atributo format es inválido.',
    'required' => 'El :atributo campo es requerido.',
    'required_if' => 'El :atributo campo es requerido cuando :otro es :valor.',
    'required_unless' => 'El :atributo campo es requerido unless :otro está en :valores.',
    'required_with' => 'El :atributo campo es requerido cuando :valores es present.',
    'required_with_all' => 'El :atributo campo es requerido cuando :valores están presentes.',
    'required_without' => 'El :atributo campo es requerido cuando :valores no están presentes.',
    'required_without_all' => 'El :atributo campo es requerido cuando ningun de los :valores están presentes.',
    'same' => 'El :atributo y :otro deben coincidir.',
    'size' => [
        'numeric' => 'El :atributo debe ser :tamaño.',
        'file' => 'El :atributo debe ser :tamaño kilobytes.',
        'string' => 'El :atributo debe ser :tamaño caracter.',
        'array' => 'El :atributo debe contener :tamaño items.',
    ],
    'starts_with' => 'El :atributo debe comenzar con lo siguiente: :valores.',
    'string' => 'El :atributo debe ser un string.',
    'timezone' => 'El :atributo debe ser una zona válida.',
    'unique' => 'El :atributo ya ha sido tomado.',
    'uploaded' => 'El :atributo falló en cargar.',
    'url' => 'El :atributo format es inválido.',
    'uuid' => 'El :atributo debe ser un UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for atributos using the
    | convention "atributo.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given atributo rule.
    |
    */

    'custom' => [
        'atributo-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Atributos
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our atributo placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'atributos' => [],

];
