<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Repositories\SMSRepository;
use App\Imports\ImportSMS;
use App\SMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SmsController extends Controller
{
    protected $smsRepository;

    /**
     * SmsController constructor.
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
        $smss = $this->smsRepository->findAllBySchool(Auth::user()->id);
        return view('sms.lists', compact('smss'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexDelivered(){
        $smss = $this->smsRepository->deliveredSMSBySchool(Auth::user()->id);
        return view('sms.delivered', compact('smss'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexNotSent(){
        $smss = $this->smsRepository->notSentSMSBySchool(Auth::user()->id);
        return view('sms.notsent', compact('smss'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexScheduled(){
        $smss = $this->smsRepository->scheduledSMSBySchool(Auth::user()->id);
        return view('sms.scheduled', compact('smss'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexWaiting(){
        $smss = $this->smsRepository->inWaitingStateSMSBySchool(Auth::user()->id);
        return view('sms.waiting', compact('smss'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexRejected(){
        $smss = $this->smsRepository->rejectedSMSBySchool(Auth::user()->id);
        return view('sms.rejected', compact('smss'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    public function importExportView()

    {
        return view('sms.import');
    }

    public function import(){
        Excel::import(new ImportSMS(), request()->file('file'));
        return back()->with('import_success','fichier importé avec succès');
    }

    public function creditSMS(){

        $url            = 'https://api.fastermessage.com/v1/sms/balance/';
        $apiKey         = config('apisms.key');

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '');
        $result = curl_exec($ch);
        $result = json_decode($result, true);
        curl_close($ch);
        return view('sms.credit',compact('result'));

    }

    public static function sendSMS($from, $to, $text, $messageId, $dateTime)
    {
        $url            = 'https://api.fastermessage.com/v1/sms/send/';
        $apiKey         = config('apisms.key');
        $smsData        = array(
            'from'      => $from,
            'to'        => $to,
            'text'      => $text,
            'messageId' => $messageId,
            'dateTime'  => $dateTime,
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $smsData);
        $result = curl_exec($ch);
        $result = json_decode($result, true);
        curl_close($ch);
        return $result;
    }

    public static function checkSMS($messageId){
        $url            = 'https://api.fastermessage.com/v1/sms/dlr/';
        $apiKey         = config('apisms.key');
        $smsData        = array(
            'messageId' => $messageId,
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $smsData);
        $result = curl_exec($ch);
        $result = json_decode($result, true);
        curl_close($ch);
        return $result;
    }

    public static function jobSendSMS(){
        $smsRepo = new SMSRepository(SMS::class);
        $smss = $smsRepo->notSentSMS();

        foreach ($smss as $sms){
            $result = SmsController::sendSMS(
                $sms->sms_sender,
                $sms->sms_receiver,
                $sms->sms_value,
                $sms->id,
                $sms->sms_send_date.' '.$sms->sms_send_time);
            $smsRepo->updateAfterSent($sms->id,$result);
        }
    }

    public static function jobCheckSMS(){
        $smsRepo = new SMSRepository(SMS::class);
        $smss = $smsRepo->scheduledSMS();

        foreach ($smss as $sms){
            $result = SmsController::checkSMS($sms->id);
            $smsRepo->updateSMSState($sms->id, $result['messageStatusCode']);
        }

        $smss = $smsRepo->inWaitingStateSMS();

        foreach ($smss as $sms){
            $result = SmsController::checkSMS($sms->id);
            $smsRepo->updateSMSState($sms->id, $result['messageStatusCode']);
        }
    }

}
