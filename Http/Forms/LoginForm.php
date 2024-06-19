<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function __construct($attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }
    
        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please provide a valid password.';
        }

    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        if($instance->failed()) {
            throw new ValidationException();
        }

        // el form no tiene errores
        return $instance;
    }
    
    public function failed()
    {
        return count($this->errors);
    }

    // agregar un getter para sacar los errores si los hubiera
    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}