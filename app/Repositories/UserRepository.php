<?php

namespace finance\Repositories;

use finance\Models\User;

class UserRepository extends CrudRepository
{

    protected $modelClass = User::class;

}