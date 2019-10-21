<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SMSRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sms_sender' => 'required|string',
            'sms_receiver' => 'required',
            'student_matricule' => 'required',
            'student_level' => 'required',
            'sms_value' => 'required',
            'nbr_page_sms' => 'integer',
            'sms_price' => 'integer',
            'id_school' => 'integer',
            'sms_send_date' => 'required',
            'sms_send_time' => 'required',
            'sms_state' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sms_sender.required' => 'Le numéros de l\'expéditeur est obligatoire',
            'sms_receiver.required' => 'Le numéros du destinataire est obligatoire',
            'student_matricule.required' => 'Le matricule de l\'élève est obligatoire',
            'student_level.required' => 'La classe de l\'élève est obligatoire',
            'sms_value.required' => 'Le contenu du SMS ne peut être vide',
            'sms_send_date.required' => 'La date d\'envoie du sms est obligatoire',
            'sms_send_time.required' => 'L\'heure d\'envoie du sms est obligatoire'
        ];
    }
}
