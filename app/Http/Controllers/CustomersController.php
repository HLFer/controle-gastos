<?php

namespace finance\Http\Controllers;

use finance\Http\Requests\Customer\CreateCustomerRequest;
use finance\Http\Requests\Customer\UpdateCustomerRequest;
use finance\Http\Requests\User\CreateUserRequest;
use finance\Http\Requests\User\UpdateUserRequest;
use finance\Models\User;
use finance\Repositories\CustomerRepository;
use finance\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;


class CustomersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $customers = $this->repository->getAll();

        return view('customers.index', ['customers' => $customers]);
    }

    public function show($id = null){
        $customer = $this->repository->findByID($id, false);

        if($customer){
            return view('customers.show', ['customer' => $customer]);
        }

        return redirect(route('customers.index'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CreateCustomerRequest $request)
    {
        $this->repository->create($request->all());

        Session::flash('alert', [
            'type' => 'success',
            'message' => 'Cliente cadastrato com sucesso.'
        ]);

        return redirect('customers');
    }

    public function edit($id = null)
    {
        $customer = $this->repository->findByID($id, false);

        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(UpdateCustomerRequest $request, $id = null)
    {
        $customer = $this->repository->findByID($id, false);

        if($customer){

            $this->repository->update($customer, $request->all());

            Session::flash('alert', [
                'type' => 'success',
                'message' => 'Cliente alterado com sucesso.'
            ]);
        }else{
            Session::flash('alert', [
                'type' => 'error',
                'message' => 'Cliente não pode ser alterado. Tente novamente.'
            ]);
        }

        return redirect('customers');
    }

    public function destroy($id = null)
    {
        $customer = $this->repository->findByID($id, false);

        if($customer){
            $this->repository->delete($customer);
            Session::flash('alert', [
                'type' => 'success',
                'message' => 'Cliente removido com sucesso.'
            ]);
        }else{
            Session::flash('alert', [
                'type' => 'error',
                'message' => 'Cliente não pode ser excluído. Tente novamente.'
            ]);
        }
        return redirect('customers');
    }

}