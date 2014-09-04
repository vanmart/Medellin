<?php

return array(

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

	"accepted"             => ":attribute debe ser aceptado.",
	"active_url"           => ":attribute no es una URL valida.",
	"after"                => ":attribute debe ser de una fecha despues de :date.",
	"alpha"                => ":attribute solo puede contener letras.",
	"alpha_dash"           => ":attribute solo puede contener, letras, numeros y guiones.",
	"alpha_num"            => ":attribute solo puede contener letras y numeros.",

	"array"                => ":attribute debe ser un arreglo.",
	"before"               => ":attribute debe ser de una fecha antes de :date.",
	"between"              => array(
		"numeric" => ":attribute debe estar entre :min y :max.",
		"file"    => ":attribute debe pesar :min y :max kilobytes.",
		"string"  => ":attribute debe contener entre :min y :max caracteres.",
		"array"   => ":attribute debe contener entre :min y :max items.",
	),
	"confirmed"            => ":attribute la confirmacion no coincide.",
	"date"                 => ":attribute no es una fecha valida.",
	"date_format"          => ":attribute no corresponde con el formato :format.",
	"different"            => ":attribute y :other deben ser diferentes.",
	"digits"               => ":attribute deben ser :digits digitos.",
	"digits_between"       => ":attribute debe ser de minimo :min y maximo :max digitos.",
	"email"                => ":attribute debe ser una direccion de correo valida.",
	"exists"               => "El atributo  :attribute es invalido.",
	"image"                => ":attribute debe ser una imagen.",
	"in"                   => "el atributo seleccionado :attribute es invalido.",
	"integer"              => ":attribute debe ser un entero.",
	"ip"                   => ":attribute debe ser una direccion ip valida.",
	"max"                  => array(
		"numeric" => ":attribute no puede ser mayor que :max.",
		"file"    => ":attribute no puede pesar mas de :max kilobytes.",
		"string"  => ":attribute no puede contener mas de :max caracteres.",
		"array"   => ":attribute no puede tener mas de :max items.",
	),
	"mimes"                => ":attribute debe ser un tipo de archivo: :values.",
	"min"                  => array(
		"numeric" => ":attribute debe ser por lo menos :min.",
		"file"    => ":attribute debe ser por lo menos de :min kilobytes.",
		"string"  => ":attribute debe ser por lo menos de :min characters.",
		"array"   => ":attribute debe tener po rlo menos :min items.",
	),
	"not_in"               => "el atributo seleccionado :attribute es invalido.",
	"numeric"              => ":attribute debe ser un numero.",
	"regex"                => ":attribute es formato es invalido.",
	"required"             => ":attribute el campo es requerido.",
	"required_if"          => ":attribute este campo es requerido cuando :other es :value.",
	"required_with"        => ":attribute este campo es requerido cuando :values esta presente.",
	"required_with_all"    => ":attribute este campo es requerido cuando :values esta present.",
	"required_without"     => ":attribute este campo es requerido cuando :values no esta presente.",
	"required_without_all" => ":attribute este campo es requerido cuando ninguno de estos valores :values estan presentes.",
	"same"                 => ":attribute y :other deben coincidir.",
	"size"                 => array(
		"numeric" => ":attribute debe ser de :size.",
		"file"    => ":attribute debe ser de :size kilobytes.",
		"string"  => ":attribute debe ser de  :size caracteres.",
		"array"   => ":attribute debe contener :size items.",
	),
	"unique"               => ":attribute ya ha sido utilizado.",
	"url"                  => ":attribute el formato es invalido.",

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

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
			//'alpha_spaces'		   => ':attribute solo puede contener letras y espacios',
		),
	),

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

	'attributes' => array(),

);
