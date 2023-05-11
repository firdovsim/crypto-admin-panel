<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::query()->first();

        return view('admin.settings.index', [
            'setting' => $setting
        ]);
    }

    public function store(SettingRequest $request): RedirectResponse
    {
        $setting = Setting::first();
        $setting->update($request->all());

        return redirect()->back();
    }
}
