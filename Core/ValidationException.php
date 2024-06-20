<?php

namespace Core;

class ValidationException extends \Exception
{
    // esta se puede hacer public, o sino hacer un getter más abajo
    // también se puede hacer public readonly array $errors y omitir el getter
    // protected $errors = [];
    // esta es  $instance->$attributes en LoginForm
    // protected $old = [];
    public readonly array $errors;
    // esta es  $instance->$attributes en LoginForm
    public readonly array $old;
    

    public static function throw($errors, $old)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }
    // este es el getter
    // public function errors()
    // {
    //     return $this->errors;
    // }
}