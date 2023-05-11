<?php

namespace App\Services;

class Binance
{
    private string $apiKey;
    private string $apiSecret;

    public function __construct($apiKey, $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    public function futures(): BinanceFuture
    {
        $api_url = config('binance-api.urls.fapi');

        return new BinanceFuture($this->apiKey, $this->apiSecret, $api_url);
    }
}
