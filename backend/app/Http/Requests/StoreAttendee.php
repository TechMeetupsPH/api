<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendee extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $email = $this->request->get('email');
        return [
            'meetup_id' => 'exists:meetup,id|unique_attendee:' . $email,
        ];
    }

    public function messages()
    {
        return [
            'meetup_id.unique_attendee' => 'You already joined in this meetup.'
        ];
    }
}
