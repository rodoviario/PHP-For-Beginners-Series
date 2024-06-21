<?php

use Core\Validator;

it('validates a string', function () {
    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();
});

it('validates a string with a minimum length', function () {
    expect(Validator::string('foobar', 20))->toBeFalse();
});

it('validates a email', function () {
    expect(Validator::email('foobar'))->toBeFalse();
    // este falla porque en la implementación devuelve false o el email
    // puede resolverse allí haciendo cast a (bool) dentro de la definición:
    // return (bool) filter_var($value, FILTER_VALIDATE_EMAIL);
    // o haciendo public static function email($value): bool;
    // en la funcion dentro de Validator.php
    expect(Validator::email('foobar@foo.bar'))->toBeTrue();
});

// este test es para validation first o test driven development
// falla porque lafuncionalidad no existe todavía
it('validates a number is greater than a given ammount', function () {
    expect(Validator::greaterThan(10, 1))->toBeTrue();
})->only();