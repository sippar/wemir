<?php namespace Wemir\Exceptions;

use Exception;

class ValidationException extends Exception
{

    /**
     * @var mixed
     */
    protected $errors;

    public function __construct($errors, $message = '', $code = 0, Exception $previous = null)
    {
        $this->errors = $errors;

        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }
}