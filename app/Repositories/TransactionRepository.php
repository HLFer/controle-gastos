<?php

namespace finance\Repositories;

use finance\Models\Transaction;

class TransactionRepository extends CrudRepository
{

    protected $modelClass = Transaction::class;

    public function types()
    {
        $transaction = new Transaction;
        return $transaction->getTypes();
    }

    public function listAll()
    {
        $query = $this->newQuery();

        return $query->with('customer')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function total()
    {
        $query = $this->newQuery();
        $total = $query->sum('amount');

        return number_format($total, 2, ',', '.');
    }

    public function totalIn()
    {
        $query = $this->newQuery();
        $total = $query
            ->where('type', 'E')
            ->sum('amount');

        return number_format($total, 2, ',', '.');
    }

    public function totalOut()
    {
        $query = $this->newQuery();
        $total = $query
            ->where('type', 'S')
            ->sum('amount');

        return number_format($total, 2, ',', '.');
    }

}