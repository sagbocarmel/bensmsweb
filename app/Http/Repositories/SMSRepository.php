<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 10/19/19
 * Time: 10:37 PM
 */

namespace App\Http\Repositories;


use App\SMS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SMSRepository implements SMSRepositoryInterface
{

    protected $sms;

    /**
     * SMSRepository constructor.
     * @param SMS $sms
     */
    public function __construct(SMS $sms)
    {
        $this->sms = $sms;
    }

    /**
     * @param array $inputs
     * @return bool
     */
    public function store(array $inputs)
    {
        $this->sms = new SMS();

        $this->sms->sms_sender = $inputs['sms_sender'];
        $this->sms->sms_receiver = $inputs['sms_receiver'];
        $this->sms->student_matricule = $inputs['student_matricule'];
        $this->sms->student_level = $inputs['student_level'];
        $this->sms->sms_value = $inputs['sms_value'];
        $this->sms->sms_send_date = $inputs['sms_send_date'];
        $this->sms->sms_send_time = $inputs['sms_send_time'];
        $this->sms->nbr_page_sms = $inputs['nbr_page_sms'];
        $this->sms->sms_price = $inputs['sms_price'];
        $this->sms->sms_state = $inputs['sms_state'];
        $this->sms->sms_school_user_id = Auth::user()->id;

        return $this->sms->save();

    }

    /**
     * @param $id
     * @param array $inputs
     * @return SMS|bool
     */
    public function update($id, array $inputs)
    {
        $this->sms = SMS::where('id',$id)->first();
        $this->sms->sms_sender = $inputs['sms_sender'];
        $this->sms->sms_receiver = $inputs['sms_receiver'];
        $this->sms->student_matricule = $inputs['student_matricule'];
        $this->sms->student_level = $inputs['student_level'];
        $this->sms->sms_value = $inputs['sms_value'];
        $this->sms->sms_send_date = $inputs['sms_send_date'];
        $this->sms->sms_send_time = $inputs['sms_send_time'];
        $this->sms->nbr_page_sms = $inputs['nbr_page_sms'];
        $this->sms->sms_price = $inputs['sms_price'];
        $this->sms->sms_state = $inputs['sms_state'];
        $this->sms->sms_school_user_id = Auth::user()->id;
        $this->sms = $this->sms->save();

        return $this->sms;
    }

    /**
     * @return SMS[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return SMS::all();
    }

    /**
     * @param $idSchool
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function findAllBySchool($idSchool)
    {
        return  SMS::where('sms_school_user_id',$idSchool)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return SMS::where('id', $id)->firstOrFail();
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        SMS::where('id', $id)->delete();
    }

    /**
     * @param $idSchool
     */
    public function deleteAllBySchool($idSchool)
    {
        SMS::where('sms_school_user_id',$idSchool)->delete();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function notSentSMS()
    {
        return $users = DB::table('s_m_s_s')
            ->where('sms_state', '=', 6 )
            ->orderBy('sms_send_date', 'asc')
            ->get();
        //SMS::where('sms_state', 6)->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function deliveredSMS()
    {
        return $users = DB::table('s_m_s_s')
            ->where('sms_state', '=', 3)
            ->orderBy('sms_send_date', 'desc')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function scheduledSMS()
    {
        return $users = DB::table('s_m_s_s')
            ->where('sms_state', '=', 2)
            ->orderBy('sms_send_date', 'desc')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function rejectedSMS()
    {
        return $users = DB::table('s_m_s_s')
            ->where('sms_state', '=', 0)
            ->orderBy('sms_send_date', 'desc')
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function inWaitingStateSMS()
    {
        return $users = DB::table('s_m_s_s')
            ->where('sms_state', '=', 1)
            ->orderBy('sms_send_date', 'desc')
            ->get();
    }

    public function notSentSMSBySchool($id_school)
    {
        return $users = DB::table('s_m_s_s')
            ->where('sms_state', '=', 6)
            ->where('sms_school_user_id','=',$id_school)
            ->orderBy('sms_send_date', 'desc')
            ->get();
    }

    public function deliveredSMSBySchool($id_school)
    {
        return $users = DB::table('s_m_s_s')
            ->where('sms_state', '=', 3)
            ->where('sms_school_user_id','=',$id_school)
            ->orderBy('sms_send_date', 'desc')
            ->get();
    }

    public function scheduledSMSBySchool($id_school)
    {
        return $users = DB::table('s_m_s_s')
            ->where('sms_state', '=', 2)
            ->where('sms_school_user_id','=',$id_school)
            ->orderBy('sms_send_date', 'desc')
            ->get();
    }

    public function rejectedSMSBySchool($id_school)
    {
        return $users = DB::table('s_m_s_s')
            ->where('sms_state', '=', 0)
            ->where('sms_school_user_id','=',$id_school)
            ->orderBy('sms_send_date', 'desc')
            ->get();
    }

    public function inWaitingStateSMSBySchool($id_school)
    {
        return $users = DB::table('s_m_s_s')
            ->where('sms_state', '=', 1)
            ->where('sms_school_user_id','=',$id_school)
            ->orderBy('sms_send_date', 'desc')
            ->get();
    }


    public function updateSMSState($id_sms, $state)
    {
        $this->sms = SMS::where('id',$id_sms)->first();

        $this->sms->sms_state = $state;

        $this->sms = $this->sms->save();

        return $this->sms;
    }


    public function updateAfterSent($id, array $inputs)
    {
        $this->sms = SMS::where('id',$id)->first();

        $this->sms->nbr_page_sms = $inputs['smsCount'];
        $this->sms->sms_price = $inputs['messagePrice'];
        $this->sms->sms_state = $inputs['messageStatusCode'];

        $this->sms = $this->sms->save();

        return $this->sms;
    }
}