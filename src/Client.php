<?php

namespace WebNIC;

class Client
{


    public $token;

    public function __construct(string $username, string $password)
    {

        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.webnic.cc',
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            "verify" => false
        ]);

        $resp = $client->post("/reseller/v2/api-user/token", [
            "json" => [
                "username" => $username,
                "password" => $password
            ]
        ]);

        $this->token = json_decode($resp->getBody()->getContents())->data->access_token;

    }

    public function domain()
    {
        $client = new \GuzzleHttp\Client([
            "base_uri" => "https://api.webnic.cc",
            "verify" => false,
            "headers" => [
                "Authorization" => "Bearer " . $this->token
            ]
        ]);

        return new Domain($client);
    }

    public function dns()
    {
        $client = new \GuzzleHttp\Client([
            "base_uri" => "https://api.webnic.cc",
            "verify" => false,
            "headers" => [
                "Authorization" => "Bearer " . $this->token
            ]
        ]);
        return new DNS($client);
    }

    public function reseller()
    {
        $client = new \GuzzleHttp\Client([
            "base_uri" => "https://api.webnic.cc",
            "verify" => false,
            "headers" => [
                "Authorization" => "Bearer " . $this->token
            ]
        ]);
        return new Reseller($client);
    }
}
