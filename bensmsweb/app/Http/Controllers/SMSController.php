<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SMSRepository;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    protected $smsRepository;

    /**
     * SMSController constructor.
     * @param $smsRepository
     */
    public function __construct(SMSRepository $smsRepository)
    {
        $this->smsRepository = $smsRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->smsRepository->findAll().isEmpty())
        {
            return response([
                'success' => true,
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'smss' => $this->smsRepository->findAll()
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->smsRepository->find($id) == null)
        {
            return response([
                'success' => true,
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'sms' => $this->smsRepository->find($id)
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
    public function update(Request $request, $id)
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
        $this->smsRepository->delete($id);
        return response()->json(['success' => true ,
            'message' => 'SMS supprimée avec succès'], 200);
    }
}
