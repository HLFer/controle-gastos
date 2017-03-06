<?php

namespace finance\Http\Controllers;

use finance\Http\Requests\User\CreateUserRequest;
use finance\Http\Requests\User\UpdateUserRequest;
use finance\Models\User;
use finance\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;


class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $users = $this->repository->getAll();

        return view('users.index', ['users' => $users]);
    }

    public function show($id = null){
        $user = $this->repository->findByID($id, false);

        if($user){
            return view('users.show', ['user' => $user]);
        }

        return redirect(route('users.index'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        $this->repository->create($data);

        Session::flash('alert', [
            'type' => 'success',
            'message' => 'Usuário cadastrato com sucesso.'
        ]);

        return redirect('users');
    }

     public function edit($id = null)
    {
        $user = User::find($id);

        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, $id = null)
    {
        $user = $this->repository->findByID($id, false);

        if($user){
            $data = [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
            ];

            if (!empty($request->get('password')))
                $data['password'] = bcrypt($request->get('password'));

            $this->repository->update($user, $data);

            Session::flash('alert', [
                'type' => 'success',
                'message' => 'Usuário cadastrato com sucesso.'
            ]);
        }else{
            Session::flash('alert', [
                'type' => 'error',
                'message' => 'Usuário não pode ser salvo. Tente novamente.'
            ]);
        }

        return redirect('users');
    }

    public function destroy($id = null)
    {
        $user = $this->repository->findByID($id, false);

        if($user){
            $this->repository->delete($user);
            Session::flash('alert', [
                'type' => 'success',
                'message' => 'Usuário removido com sucesso.'
            ]);
        }else{
            Session::flash('alert', [
                    'type' => 'error',
                    'message' => 'Usuário não pode ser removido. Tente novamente.'
            ]);
        }
        return redirect('users');
    }

}