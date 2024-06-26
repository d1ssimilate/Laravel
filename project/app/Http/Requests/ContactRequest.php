<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:5|max:50',
            'message' => 'required|min:15|max:500',
        ];
    }
    
public function messages() {
    return [ 'name.required' => 'Поле Имя является обязательным',
    'email.required' => 'Пoлe Email является обязательным',
    'subject.required' => 'Поле Тема сообщения является обязательным', 'message.required' => 'Поле Сообщение является обязательным'
    ];
   
}
}