<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProxyRequest;
use App\Models\Proxy;
use Illuminate\Http\RedirectResponse;

class ProxyController extends Controller
{
    public function index()
    {
        $proxies = Proxy::query()->paginate(25);

        return view('admin.proxy.index', [
            'proxies' => $proxies
        ]);
    }

    public function create()
    {
        return view('admin.proxy.create');
    }

    public function store(ProxyRequest $request): RedirectResponse
    {
        Proxy::create($request->all());

        return redirect()->route('admin.proxy.index')
            ->with('message', 'Proxy created successfully');
    }

    public function edit(Proxy $proxy)
    {

        return view('admin.proxy.edit', [
            'proxy' => $proxy
        ]);
    }

    public function update(Proxy $proxy, ProxyRequest $request): RedirectResponse
    {
        $proxy->update($request->all());

        return redirect()->back()
            ->with('message', 'Proxy updated successfully');
    }

    public function destroy(Proxy $proxy): RedirectResponse
    {
        try {
            $proxy->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->with('message', 'Can not delete proxy');
        }

        return redirect()->back()->with('message', 'Successfully deleted');
    }
}
