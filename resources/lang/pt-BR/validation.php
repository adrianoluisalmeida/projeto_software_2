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

    'accepted'             => 'O :attribute deve ser aceitado.',
    'active_url'           => 'O :attribute não é uma URL váalida.',
    'after'                => 'O :attribute deve ser uma data depois de :date.',
    'alpha'                => 'O :attribute deve conter apenas letras.',
    'alpha_dash'           => 'O :attribute deve conter apenas letras, números e traços.',
    'alpha_num'            => 'O :attribute deve conter apenas letras e números.',
    'array'                => 'O :attribute deve ser um array.',
    'before'               => 'O :attribute deve ser uma data antes de :date.',
    'between'              => [
        'numeric' => 'O :attribute deve ser entre :min e :max.',
        'file'    => 'O :attribute deve ser entre :min e :max kilobytes.',
        'string'  => 'O :attribute deve ser entre :min e :max characters.',
        'array'   => 'O :attribute must have between :min Oe :max items.',
    ],
    'boolean'              => 'O campo :attribute deve ser true or false.',
    'confirmed'            => 'O :attribute de confirmação não são iguais.',
    'date'                 => 'O :attribute não é uma data válida.',
    'date_format'          => 'O :attribute não é igual ao formato :format.',
    'different'            => 'O :attribute e :other devem ser diferentes.',
    'digits'               => 'O :attribute deve ter :digits dígitos.',
    'digits_between'       => 'O :attribute deve ser entre :min e :max digits.',
    'email'                => 'O :attribute deve ser um endereço de e-mail válido.',
    'filled'               => 'O campo :attribute é requerido.',
    'exists'               => 'O :attribute selecionado é inválido.',
    'image'                => 'O :attribute deve ser uma imagem.',
    'in'                   => 'O :attribute selecionado é inválido.',
    'integer'              => 'O :attribute deve ser um inteiro.',
    'ip'                   => 'O :attribute deve ser um endereço de IP válido.',
    'max'                  => [
        'numeric' => 'O :attribute não pode ser maior que :max.',
        'file'    => 'O :attribute não pode ser maior que :max kilobytes.',
        'string'  => 'O :attribute não pode ser maior que :max caracters.',
        'array'   => 'O :attribute não pode ter mais do que :max items.',
    ],
    'mimes'                => 'O :attribute deve ser um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O :attribute deve ter pelo menos :min.',
        'file'    => 'O :attribute deve ter pelo menos :min kilobytes.',
        'string'  => 'O :attribute deve ter pelo menos :min characters.',
        'array'   => 'O :attribute deve ter pelo menos :min items.',
    ],
    'not_in'               => 'O :attribute selecionado é inválido.',
    'numeric'              => 'O :attribute deve ser um número.',
    'regex'                => 'O formato de :attribute é inválido.',
    'required'             => 'Campo :attribute é requerido.',
    'required_if'          => 'O campo :attribute é requerido quando :other is :value.',
    'required_with'        => 'O campo :attribute é requerido quando :values está presente.',
    'required_with_all'    => 'O campo :attribute é requerido quando :values está presente.',
    'required_without'     => 'O campo :attribute é requerido quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é requerido quando nenhum dos :values estiver presente.',
    'same'                 => 'O :attribute Oe :other must match.',
    'size'                 => [
        'numeric' => 'O :attribute deve ter :size.',
        'file'    => 'O :attribute deve ter :size kilobytes.',
        'string'  => 'O :attribute deve ter :size characters.',
        'array'   => 'O :attribute deve conter :size items.',
    ],
    'timezone'             => 'O :attribute deve ser a uma zona válida.',
    'unique'               => 'O :attribute já está sendo utilizado, tente utilizar outro por favor.',
    'url'                  => 'O formato de :attribute é inválido.',

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
        'name'        => 'nome',
        'title'       => 'título',
        'description' => 'descrição',
        'sub_title'   => 'sub título',
        'phone'       => 'telefone',
        'email'       => 'e-mail',
        'message'     => 'mensagem',
        'category_id' => 'categoria',
        'slug'        => 'url',
        'password'    => 'senha',
    ],

];
