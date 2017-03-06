<?php

namespace finance\Http\Controllers;

use finance\Http\Requests\Route\CreateRouteRequest;
use finance\Http\Requests\Route\UpdateRouteRequest;
use finance\Repositories\RouteRepository;
use Illuminate\Support\Facades\Session;


class RoutesController extends Controller
{
    /**
     * @var RouteRepository
     */
    protected $repository;

    public function __construct(RouteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $routes = $this->repository->getAll();

        return view('routes.index', ['routes' => $routes]);
    }

    public function show($id = null)
    {
        $route = $this->repository->findByID($id, false);

        if($route){
            return view('routes.show', ['route' => $route]);
        }

        return redirect(route('routes.index'));
    }

    public function create()
    {
        return view('routes.create');
    }

    public function store(CreateRouteRequest $request)
    {
        $this->repository->create($request->all());

        Session::flash('alert', [
            'type' => 'success',
            'message' => 'Rota cadastrada com sucesso.'
        ]);

        return redirect('routes');
    }

    public function edit($id = null)
    {
        $route = $this->repository->findByID($id, false);

        return view('routes.edit', ['route' => $route]);
    }

    public function update(UpdateRouteRequest $request, $id = null)
    {
        $route = $this->repository->findByID($id, false);

        if($route){

            $this->repository->update($route, $request->all());

            Session::flash('alert', [
                'type' => 'success',
                'message' => 'Rota alterada com sucesso.'
            ]);
        }else{
            Session::flash('alert', [
                'type' => 'error',
                'message' => 'Rota não pode ser alterada. Tente novamente.'
            ]);
        }

        return redirect('routes');
    }

    public function destroy($id = null)
    {
        $route = $this->repository->findByID($id, false);

        if($route){
            $this->repository->delete($route);
            Session::flash('alert', [
                'type' => 'success',
                'message' => 'Rota removida com sucesso.'
            ]);
        }else{
            Session::flash('alert', [
                'type' => 'error',
                'message' => 'Rota não pode ser removida. Tente novamente.'
            ]);
        }
        return redirect('routes');
    }

}