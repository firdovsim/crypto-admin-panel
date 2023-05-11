<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crypto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        return view('admin.configurations.index');
    }

    public function configureIndicator(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'minimum_rsi' => 'required|numeric|min:0|max:100',
            'maximum_rsi' => 'required|numeric|min:0|max:100'
        ]);

        $minimum_rsi = $request->get('minimum_rsi');
        $maximum_rsi = $request->get('maximum_rsi');

        if ($maximum_rsi != 0 && $minimum_rsi != 0) {
            $cryptos = Crypto::all();
            foreach ($cryptos as $crypto) {
                $crypto->update([
                    'minimum_rsi' => $minimum_rsi,
                    'maximum_rsi' => $maximum_rsi
                ]);
            }
        }

        return redirect()->back()->with('message', 'RSI Updated');
    }

    public function configureQuantity(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'multiply_quantity' => 'required',
            'divide_quantity' => 'required'
        ]);

        $multiply_quantity = $request->get('multiply_quantity');
        $divide_quantity = $request->get('divide_quantity');

        $cryptos = Crypto::all();

        if ($multiply_quantity != 0)
        {
            foreach ($cryptos as $crypto) {
                $new_quantity = $crypto->quantity * $multiply_quantity;
                $crypto->update([
                    'quantity' => $new_quantity
                ]);
            }
        }

        if ($divide_quantity != 0)
        {
            foreach ($cryptos as $crypto) {
                $new_quantity = $crypto->quantity / $divide_quantity;
                $crypto->update([
                    'quantity' => $new_quantity
                ]);
            }
        }

        return redirect()->back()->with('message', 'Quantity updated');
    }

    public function configureTakeProfit(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'multiply_take_profit' => 'required',
            'divide_take_profit' => 'required'
        ]);

        $multiply_take_profit = $request->get('multiply_take_profit');
        $divide_take_profit = $request->get('divide_take_profit');

        $cryptos = Crypto::all();

        if ($multiply_take_profit != 0)
        {
            foreach ($cryptos as $crypto) {
                $new_take_profit = $crypto->take_profit * $multiply_take_profit;
                $crypto->update([
                    'take_profit' => $new_take_profit
                ]);
            }
        }

        if ($divide_take_profit != 0)
        {
            foreach ($cryptos as $crypto) {
                $new_take_profit = $crypto->take_profit / $divide_take_profit;
                $crypto->update([
                    'take_profit' => $new_take_profit
                ]);
            }
        }

        return redirect()->back()->with('message', 'Price updated');
    }
}
