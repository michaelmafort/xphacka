<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ApiXp
{
    public function getToken()
    {
        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => env('XP_CLIENT_ID'),
            'client_secret' => env("XP_SECRET")
        ];
        $client = new Client();
        $headers = ['Content-Type' => 'application/x-www-form-urlencoded', 'User-Agent' => 'PostmanRuntime/7.26.8'];
        $request = $client->request('post', 'https://openapi.xpi.com.br/oauth2/v1/access-token', ['form_params' => $data, 'headers' => $headers]);

        return json_decode($request->getBody())->access_token;
    }

    public function request($endpoint, $data = [])
    {
        /**
         * Only to test, the username is used to connect with XP API.
         * Test user: JOAO
         */
        $endpoint = str_replace('{user}', 'JOAO', $endpoint);
        $client = new Client();
        $headers = ['Content-Type' => 'application/json', 'User-Agent' => 'PostmanRuntime/7.26.8', 'Authorization' => 'Bearer ' . $this->getToken()];
        $request = $client->request('get', env('XP_OPEN_BANKING_URI') . $endpoint, ['json' => $data, 'headers' => $headers]);

        return json_decode($request->getBody());
    }

    public function getBalance()
    {
        return $this->request('/bank/XP/users/{user}/checking-account/balance');
    }

    public function getLimit()
    {
        return $this->request('/bank/XP/users/{user}/checking-account/limit');
    }

    public function getCreditCardTransactions()
    {
        return $this->request('/bank/XP/users/{user}/credit-card');
    }

    public function getInfo()
    {
        return $this->request('/users/{user}');
    }

    public function getInvestiments()
    {
        return $this->request('/bank/XP/users/{user}/investments');
    }

    public function getCheckingAccount()
    {
        return $this->request('/bank/XP/users/{user}/checking-account');
    }

}
