<?php

namespace CodeEduUser\Http\Controllers;

use CodeEduUser\Http\Requests\UserDeleteRequest;
use CodeEduUser\Http\Requests\UserRequest;
use CodeEduUser\Repositories\UserRepository;
use Illuminate\Http\Request;


class UsersController extends Controller
{

    /**
     * @var \CodeEduUser\Repositories\UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$users = User::query()->paginate(6);
        $search = $request->get('search');
        $users = $this->repository->paginate(6);
        return view('codeeduuser::users.index', compact('users','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('codeeduuser::users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //User::create($request->all());
        $this->repository->create($request->all());
        $url = $request->get('redirect_to', route('codeeduuser.users.index'));
        $request->session()->flash('message', 'Usuário Cadastrado com Sucesso!');
        return redirect()->to($url);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit(User $user)
    public function edit($id)
    {
        $user = $this->repository->find($id);
        return view('codeeduuser::users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(UserRequest $request, User $user)
    public function update(UserRequest $request, $id)
    {
        //$user->fill($request->all());
        //$user->save();
        $data = $request->except(['password']);
        $this->repository->update($data, $id);
        $url = $request->get('redirect_to', route('codeeduuser.users.index'));
        $request->session()->flash('message', 'Usuário Alterado com Sucesso!');
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserDeleteRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    //public function destroy(User $user)
    public function destroy(UserDeleteRequest $request, $id)
    {
        $this->repository->delete($id);
        \Session::flash('message', 'Usuário Excluído com Sucesso!');
        return redirect()->to(\URL::previous());
    }
}
