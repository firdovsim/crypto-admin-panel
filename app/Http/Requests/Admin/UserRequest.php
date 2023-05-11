<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case Request::METHOD_POST:
                return [
                    'name' => 'required',
                    'email' => 'required|unique:users,email',
                    'password' => 'required|min:8',
                    'password_confirmation' => 'required|min:8',
                    'role' => 'required',
                    'is_working' => 'required',
                    'start_time' => 'required',
                    'finish_time' => 'required',
                    'api_key_real' => 'required',
                    'api_sec_real' => 'required',
                    'max_open_orders' => 'required',
                    'interval_between_orders' => 'required',
                    'max_orders_in_interval' => 'required',
                ];
            case Request::METHOD_PUT:
                return [
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'nullable|min:8',
                    'password_confirmation' => 'nullable|min:8',
                    'role' => 'required',
                    'is_working' => 'nullable',
                    'start_time' => 'required',
                    'finish_time' => 'required',
                    'api_key_real' => 'required',
                    'api_sec_real' => 'required',
                    'max_open_orders' => 'required',
                    'interval_between_orders' => 'required',
                    'max_orders_in_interval' => 'required',
                ];
            default:
                return [];
        }

    }
}
