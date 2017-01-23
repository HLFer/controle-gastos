<?php

namespace finance\Http\Controllers;

use finance\Http\Requests\Transaction\CreateTransactionRequest;
use finance\Repositories\CustomerRepository;
use finance\Repositories\TransactionRepository;
use Illuminate\Support\Facades\Session;


class TransactionsController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(CustomerRepository $customerRepository){
        $types = $this->repository->types();

        $transactions = $this->repository->listAll();
        $total = $this->repository->total();
        $totalIn = $this->repository->totalIn();
        $totalOut = $this->repository->totalOut();

        $customers = $customerRepository->pluck('name', 'id');

        return view('transactions.index', [
            'transactions' => $transactions,
            'total' => $total,
            'totalIn' => $totalIn,
            'totalOut' => $totalOut,
            'customers' => $customers,
            'types' => $types
        ]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CreateTransactionRequest $request)
    {
        $this->repository->create($request->all());

        Session::flash('alert', [
            'type' => 'success',
            'message' => 'Transação cadastrata com sucesso.'
        ]);

        return redirect('transactions');
    }



    public function destroy($id = null)
    {
        $customer = $this->repository->findByID($id, false);

        if($customer){
            $this->repository->delete($customer);
            Session::flash('alert', [
                'type' => 'success',
                'message' => 'Transação removida com sucesso.'
            ]);
        }else{
            Session::flash('alert', [
                'type' => 'error',
                'message' => 'Transação não pode ser excluída. Tente novamente.'
            ]);
        }
        return redirect('transactions');
    }

}