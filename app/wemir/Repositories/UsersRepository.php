<?php namespace Wemir\Repositories;

class UsersRepository extends DbRepository
{
    public function __construct(\User $model)
    {
        $this->model = $model;
    }

}