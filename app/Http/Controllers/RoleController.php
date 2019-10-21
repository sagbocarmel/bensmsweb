<?php

namespace App\Http\Controllers;

use App\Http\Repositories\RoleRepository;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleRepository;

    /**
     * RoleController constructor.
     * @param $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->roleRepository->findAll().isEmpty())
        {
            return response([
                'success' => true,
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'roles' => $this->roleRepository->findAll()
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = $this->roleRepository->store($request->all());

        return response()->json([
            'success' => true,
            'data' => [
                'role' => $role
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->roleRepository->find($id) == null)
        {
            return response([
                'success' => true,
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'role' => $this->roleRepository->find($id)
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role = $this->roleRepository->update($id, $request->all());

        return response()->json([
            'success' => true,
            'data' => [
                'role' => $role
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roleRepository->delete($id);
        return response()->json(['success' => true ,
            'message' => 'Role supprimée avec succès'], 200);
    }
}
