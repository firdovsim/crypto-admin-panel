<?php

namespace App\Rules;

use App\Models\TickerPrecise;
use Illuminate\Contracts\Validation\Rule;

class QuantityPreciseEquals implements Rule
{
    private readonly int $tickerId;

    private readonly TickerPrecise $precise;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $tickerId)
    {
        $this->tickerId = $tickerId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->precise = TickerPrecise::whereTickerId($this->tickerId)->first();
        if (! $this->precise) {
            return true;
        }

        if (count(explode('.', $value)) === 1) {
            return true;
        }
        $decimals = explode('.', $value);
        $decimals = end($decimals);

        $decimals = strlen($decimals);

        return $decimals <= $this->precise->quantity_precision;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The quantity precision should be less than or equals {$this->precise->quantity_precision}";
    }
}
