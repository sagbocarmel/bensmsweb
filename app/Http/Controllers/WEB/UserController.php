<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;
use App\Http\Repositories\RoleRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    protected $roleRepositorie;
    protected $userRepository;
    protected $user;
    /**
     * UserController constructor.
     */
    public function __construct(User $user,UserRepository $userRepository ,RoleRepository $roleRepositorie)
    {
        $this->user = $user;
        $this->userRepository = $userRepository;
        $this->roleRepositorie = $roleRepositorie;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = $this->userRepository->findAll();
        return view('users.lists',compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleRepositorie->findAll();
        return view('users.register',compact('roles'));
    }

    /**
     * @param UserRequest $userRequest
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $userRequest)
    {
        $input = $userRequest->all();
        $res = $this->userRepository->findByData($userRequest->email,$userRequest->phone_number, $userRequest->username);
        switch ($res){
            case 1: return  Redirect::back()
                ->with('email_error','Une école possède déjà cet e-mail')
                ->withInput();
                break;
            case 2:return  Redirect::back()
                ->with('phone_error','Une école possède déjà ce numéros de téléphone')
                ->withInput();
                break;
            case 3: return Redirect::back()
                ->with('username_error','Une école possède déjà ce username')
                ->withInput();
                break;
        }
        if($userRequest->password != $userRequest->confirm_password){
            return Redirect::back()
                ->with('password_error','Le mot de passe ne correspond pas.')
                ->withInput();
        }
        $role_id = $userRequest->id_role;
        $this->user = $this->userRepository->store($input);
        $this->userRepository->setRole($this->user->id, $role_id);
        return redirect("/ben/sms/user/create")->with('success','Félicitation! Nouvelle école '.$this->user->school_name.' correctement créé.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        return view('users.details', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = $this->roleRepositorie->findAll();
        $user = $this->userRepository->find($id);
        $userRole = $this->userRepository->getRole($id);
        return view('users.edit',  compact('user','userRole', 'roles'));
    }

    /**
     * @param UserRequest $userRequest
     * @param $id
     * @param $id_role
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserRequest $userRequest, $id, $id_role)
    {
        $input = $userRequest->all();
        $res = $this->userRepository->findForUpdateByData($id,$userRequest->email,$userRequest->phone_number, $userRequest->username);
        switch ($res){
            case 1: return  Redirect::back()
                ->with('email_error','Une école possède déjà cet e-mail')
                ->withInput();
                break;
            case 2:return  Redirect::back()
                ->with('phone_error','Une école possède déjà ce numéros de téléphone')
                ->withInput();
                break;
            case 3: return Redirect::back()
                ->with('username_error','Une école possède déjà ce username')
                ->withInput();
                break;
        }
        if($userRequest->password != $userRequest->confirm_password){
            return Redirect::back()
                ->with('password_error','Le mot de passe ne correspond pas.')
                ->withInput();
        }
        $role_id = $userRequest->id_role;
        $this->user = $this->userRepository->update($id,$input);
        $this->userRepository->updateRole($id_role, $this->user->id, $role_id);
        return redirect("/ben/sms/user/list")->with('success','Félicitation! École'.$this->user->school_name.' mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->delete($id);

        return redirect()->back();
    }
}
