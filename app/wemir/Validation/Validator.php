<?php namespace Wemir\Validation;

use Validator as V;
use Wemir\Exceptions\ValidationException;

abstract class Validator
{
    protected  function validate($input, $rules)
    {
        $validator = V::make($input,$rules);

        if($validator->fails()) {

            throw new ValidationException($validator->messages());
        }

        return true;
    }

    public  function validateForCreate($input)
    {
        return $this->validate($input,$this->rulesCreate());
    }

    public function validateForUpdate($input,$id)
    {
        return $this->validate($input,$this->rulesUpdate($id));
    }

}