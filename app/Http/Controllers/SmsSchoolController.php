<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SMSRepository;
use App\Http\Requests\SMSRequest;
use Illuminate\Http\Request;

class SmsSchoolController extends Controller
{
    protected $smsRepository;

    /**
     * SmsSchoolController constructor.
     * @param SMSRepository $smsRepository
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
    public function index($id_school)
    {
        if($this->smsRepository->findAllBySchool($id_school) == null)
        {
            return response([
                'success' => true,
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'smss' => $this->smsRepository->findAllBySchool($id_school)
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SMSRequest $request)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SMSRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_school)
    {
        $this->smsRepository->deleteAllBySchool($id_school);
        return response()->json(['success' => true ,
            'message' => 'Messages supprimées avec succès'], 200);
    }
}
