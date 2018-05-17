<?php

namespace CodeEduUser\Http\Controllers;

use CodeEduUser\Http\Requests\UserSettingRequest;
use CodeEduUser\Repositories\UserRepository;


class UserSettingsController extends Controller
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
     * Show the form for editing the specified resource.
     *
     * @param  \CodeEduBook\Models\User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit()
    {
        $user = \Auth::user();
        return view('codeeduuser::user-settings.setting', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest/Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param User $user
     * @internal param int $id
     */
    public function update(UserSettingRequest $request)
    {
        $user = \Auth::user();
        $this->repository->update($request->all(), $user->id);
        $request->session()->flash('message', 'Usuário Alterado com Sucesso!');
        return redirect()->route('codeeduuser.user_settings.edit');
    }

}
