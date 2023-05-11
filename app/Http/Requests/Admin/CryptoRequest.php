<?php

namespace App\Http\Requests\Admin;

use App\Rules\PricePreciseEquals;
use App\Rules\QuantityPreciseEquals;
use Illuminate\Foundation\Http\FormRequest;

class CryptoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'ticker_id' => 'required',
            'user_id' => 'required',
            'quantity' => ["required", new QuantityPreciseEquals($this->ticker_id)],
            'take_profit' => ["required", new PricePreciseEquals($this->ticker_id)],
            'stop_loss' => 'required',
            'status' => 'nullable',
            'minimum_rsi' => 'required',
            'maximum_rsi' => 'required',
            'interval' => 'required'
        ];
    }
}
