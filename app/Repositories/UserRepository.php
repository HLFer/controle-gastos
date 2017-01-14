<?php

namespace finance\Repositories;

use finance\Models\User;

class UsersRepository extends CrudRepository
{

    protected $modelClass = User::class;

}