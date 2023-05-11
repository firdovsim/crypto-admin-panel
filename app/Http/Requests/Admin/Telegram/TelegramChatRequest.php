<?php

namespace App\Http\Requests\Admin\Telegram;

use Illuminate\Foundation\Http\FormRequest;

class TelegramChatRequest extends FormRequest
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
            'chat_id' => 'required',
            'telegraph_bot_id' => 'required'
        ];
    }
}
