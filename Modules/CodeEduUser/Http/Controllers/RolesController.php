<?php

namespace CodeEduUser\Http\Controllers;

use CodeEduUser\Http\Requests\RoleDeleteRequest;
use CodeEduUser\Http\Requests\RoleRequest;
use CodeEduUser\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class RolesController extends Controller
{
    private $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $roles = $this->repository->paginate(8);
        return view('codeeduuser::roles.index', compact('roles'));
    }

    public function create()
    {
        return view('codeeduuser::roles.create');
    }

    public function store(RoleRequest $request)
    {
        $this->repository->create($request->all());
        $url = $request->get('redirect_to', route('codeeduuser.roles.index'));
        $request->session()->flash('message', 'Papel de usuário cadastrado com Sucesso!');
        return redirect()->to($url);
    }

    public function edit($id)
    {
        $role = $this->repository->find($id);
        return view('codeeduuser::roles.edit', compact('role'));
    }

    public function update(RoleRequest $request, $id)
    {
        $this->repository->update($request->all(), $id);
        $url = $request->get('redirect_to', route('codeeduuser.roles.index'));
        $request->session()->flash('message', 'Papel de usuário alterado com Sucesso!');
        return redirect()->to($url);
    }

    public function destroy(RoleDeleteRequest $request, $id)
    {
        try {
            $this->repository->delete($id);
            \Session::flash('message', 'Papel de usuário excluído com Sucesso!');
        } catch (QueryException $e) {
            \Session::flash('error', 'Papel de usuário não pode ser excluído!');
        }
        return redirect()->to(\URL::previous());
    }
}
