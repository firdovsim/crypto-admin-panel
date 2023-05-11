<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crypto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CryptoStatusController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $crypto = Crypto::query()
            ->where('id', $request->get('id'))
            ->first();
        if ($crypto->is_blocked) {
            $crypto->update(['is_blocked' => false]);
        } else {
            $crypto->update(['is_blocked' => true]);
        }

        return redirect()->back();
    }
}
