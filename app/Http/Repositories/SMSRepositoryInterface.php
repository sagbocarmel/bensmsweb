<?php
/**
 * Created by PhpStorm.
 * User: sagbo
 * Date: 10/19/19
 * Time: 10:38 PM
 */

namespace App\Http\Repositories;


interface SMSRepositoryInterface
{
    public function store(Array $inputs);
    public function update($id, Array $inputs);
    public function findAll();
    public function findAllBySchool($idSchool);
    public function find($id);
    public function delete($id);
    public function deleteAllBySchool($idSchool);

    public function notSentSMS();
    public function deliveredSMS();
    public function scheduledSMS();
    public function rejectedSMS();
    public function inWaitingStateSMS();

    public function notSentSMSBySchool($id_school);
    public function deliveredSMSBySchool($id_school);
    public function scheduledSMSBySchool($id_school);
    public function rejectedSMSBySchool($id_school);
    public function inWaitingStateSMSBySchool($id_school);

    public function updateSMSState($id_sms, $state);
    public function updateAfterSent($id,  array $inputs);
}