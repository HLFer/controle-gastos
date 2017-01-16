<?php

namespace finance\Repositories;

use finance\Models\Transaction;

class TransactionRepository extends CrudRepository
{

    protected $modelClass = Transaction::class;

}