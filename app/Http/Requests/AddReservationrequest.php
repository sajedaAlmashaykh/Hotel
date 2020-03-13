<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddReservationrequest extends FormRequest
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

            'room_id'=>'required',
            'num_of_guests'=>'required',
            'arrival'=>'required',
            'departure'=>'requird',
            'name_of_guests'=>'requird',
            'phone_number_of_guests'=>'requird',
            'loction_of_guests'=>'requird'

        ];
    }
}
