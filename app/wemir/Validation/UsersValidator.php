<?php namespace Wemir\Validation;

class UsersValidator extends  Validator
{
    public function rulesCreate()
    {
        return
        [
            'email'            => 'required|email',
            'password'         => 'required|min:4|same:password_confirm',
            'password_confirm' => 'required',
        ];
    }

    public function rulesUpdate($id)
    {
        return
        [
            'email'            => 'required|email|unique:users,email,'.$id,
            'password'         => 'min:4|same:password_confirm',
            'password_confirm' => 'same:password',
        ];
    }
}