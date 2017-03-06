<?php

namespace finance\Repositories;

use finance\Models\Customer;

class CustomerRepository extends CrudRepository
{

    protected $modelClass = Customer::class;

}