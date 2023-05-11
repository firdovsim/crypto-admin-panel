<?php

namespace App\Http\Requests\Admin\Telegram;

use Illuminate\Foundation\Http\FormRequest;

class TelegramBotRequest extends FormRequest
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
            'name' => 'required',
            'token' => 'required|unique:telegraph_bots',
            'user_id' => 'required'
        ];
    }
}
