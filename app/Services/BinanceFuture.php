<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use TechTailor\BinanceApi\BinanceAPI;
use TechTailor\BinanceApi\Traits\HandlesResponseErrors;

class BinanceFuture extends BinanceAPI
{
    use HandlesResponseErrors;

    /**
     * Constructor for BinanceAPI.
     *
     * @param null $api_key
     * @param null $api_secret
     * @param null $api_url API base URL (see config for example)
     */
    public function __construct($api_key = null, $api_secret = null, $api_url = null)
    {
        parent::__construct($api_key, $api_secret, $api_url);
    }

    /**
     * @throws \Exception
     */
    public function getTime()
    {
        return $this->publicRequest('v1/time');
    }

    public function getAccountInfo()
    {
        return $this->privateRequest('v1/account');
    }

    /**
     * @throws \Exception
     */
    public function getTotalWalletBalance()
    {
        return $this->getAccountInfo()['totalWalletBalance'];
    }

    /**
     * Make public requests (Security Type: NONE).
     *
     * @param string $url    URL Endpoint
     * @param array  $params Required and optional parameters
     * @param string $method GET, POST, PUT, DELETE
     *
     * @throws \Exception
     *
     * @return mixed
     */
    protected function publicRequest($url, $params = [], $method = 'GET')
    {
        // Build the POST data string
        if (!in_array($url, $this->no_time_needed)) {
            $params['timestamp'] = $this->milliseconds();
            $params['recvWindow'] = $this->recvWindow;
        }

        $url = $this->api_url.$url;

        // Adding parameters to the url.
        $url = $url.'?'.http_build_query($params);

        return $this->sendApiRequest($url, $method);
    }

    /**
     * Make public requests (Security Type: USER_DATA).
     *
     * @param string $url    URL Endpoint
     * @param array  $params Required and optional parameters.
     */
    protected function privateRequest($url, $params = [], $method = 'GET')
    {
        // Build the POST data string
        if (!in_array($url, $this->no_time_needed)) {
            $params['recvWindow'] = $this->recvWindow;
            $params['timestamp'] = $this->milliseconds();
        }

        // Build the query to pass through.
        $query = http_build_query($params, '', '&');

        // Set API key and sign the message
        $signature = hash_hmac('sha256', $query, $this->api_secret);

        $url = $this->api_url.$url.'?'.$query.'&signature='.$signature;

        return $this->sendApiRequest($url, $method);
    }

    /**
     * Send request to Wazirx API for Public or Private Requests.
     *
     * @param string $url    URL Endpoint with Query & Signature
     * @param string $method GET, POST, PUT, DELETE
     *
     * @throws \Exception
     *
     * @return mixed
     */
    private function sendApiRequest($url, $method)
    {
        try {
            if ($method == 'POST') {
                $response = Http::withHeaders([
                    'X-MBX-APIKEY' => $this->api_key,
                ])->post($url);
            } elseif ($method == 'GET') {
                $response = Http::withHeaders([
                    'X-MBX-APIKEY' => $this->api_key,
                ])->get($url);
            }
        } catch (ConnectionException $e) {
            return $error = [
                'code'    => $e->getCode(),
                'error'   => 'Host Not Found',
                'message' => 'Could not resolve host: '.$this->api_url,
            ];
        } catch (Exception $e) {
            return $error = [
                'code'    => $e->getCode(),
                'error'   => 'cUrl Error',
                'message' => $e->getMessage(),
            ];
        }

        // If response if Ok. Return collection.
        if ($response->ok()) {
            return $response->collect();
        } else {
            return $this->handleError($response);
        }
    }

    /**
     * Get the milliseconds from the system clock.
     *
     * @return int
     */
    private function milliseconds()
    {
        list($msec, $sec) = explode(' ', microtime());

        return $sec.substr($msec, 2, 3);
    }
}
