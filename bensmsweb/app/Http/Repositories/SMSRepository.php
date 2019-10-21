<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 10/19/19
 * Time: 10:37 PM
 */

namespace App\Http\Repositories;


use App\SMS;
use App\SmsSchool;

class SMSRepository implements SMSRepositoryInterface
{

    protected $sms;
    protected $sms_school;

    /**
     * SMSRepository constructor.
     * @param SMS $sms
     * @param SmsSchool $sms_school
     */
    public function __construct(SMS $sms, SmsSchool $sms_school)
    {
        $this->sms = $sms;
        $this->sms_school = $sms_school;
    }

    /**
     * @param array $inputs
     * @return array
     */
    public function store(array $inputs)
    {
        $this->sms = new SMS();
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

        $this->sms_school->id_school = $inputs['id_school'];
        $this->sms_school->id_sms = $this->sms->id;
        $this->sms_school =  $this->sms_school->save();

        return ['sms' => $this->sms, 'sms_school' => $this->sms_school];
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
        return $this->sms_school->hasMany();
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
        $this->sms_school->smss()->delete();
    }
}