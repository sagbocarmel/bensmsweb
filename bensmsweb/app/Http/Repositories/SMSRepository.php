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

class SMSRepository implements SMSRepositoryInterface
{

    protected $sms;

    /**
     * SMSRepository constructor.
     * @param SMS $sms
     * @param SmsSchool $sms_school
     */
    public function __construct(SMS $sms)
    {
        $this->sms = $sms;
    }

    /**
     * @param array $inputs
     * @return array
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

        $this->sms = $this->sms->save();
    }

    /**
     * @param $id
     * @param array $inputs
     * @return SMS|bool
     */
    public function update($id, array $inputs)
    {
        $this->sms = SMS::where('id',$id)->first();
        $this->sms_school = new SmsSchool();
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
        return SMS::where('sms_school_user_id', $idSchool)->get();
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


    public function deleteAllBySchool($idSchool)
    {
        SMS::where('sms_school_user_id', $idSchool)->delete();
    }
}