<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleController extends Controller
{
    protected $userRepository;

    /**
     * UserRoleController constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->userRepository->findAll() == null)
        {
            return response([
                'success' => true,
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'users' => $this->userRepository->findAll()
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       $user = $this->userRepository->store($request->all());
        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user
            ]
        ], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('BENSMS')->accessToken;

            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error' => 'Unauthorised',
                "data" => [request('email'),request('password')]], 401);
        }
    }

    /**
     *
     */
    public function logoutApi()
    {
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->userRepository->find($id) ==  null)
        {
            return response([
                'success' => true,
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $this->userRepository->find($id)
            ]
        ], 200);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function getUser(){
        return $this->show(Auth::user()->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //
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
        return response()->json(['success' => true ,
            'message' => 'Utilisateur supprimée avec succès'], 200);
    }
}
