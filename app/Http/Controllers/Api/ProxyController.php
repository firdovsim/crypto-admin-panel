<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProxyResource;
use App\Models\Proxy;
use Illuminate\Http\Request;

class ProxyController extends Controller
{
    public function index()
    {
        $proxies = Proxy::query()
            ->oldest('id')
            ->get();

        return ProxyResource::collection($proxies);
    }
}
