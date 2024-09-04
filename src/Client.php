<?php

namespace WebNIC;

class Client
{


    public $token;

    public function __construct(string $client_id, string $client_secret)
    {

        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.webnic.cc/auth/realms/webnic/protocol/openid-connect/token',
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                "Authorization" => "Basic " . base64_encode("$client_id:$client_secret")
            ],
            "verify" => false

        ]);

        $resp = $client->post("", [
            "form_params" => [
                "grant_type" => "client_credentials",
                "scope" => "openid"
            ]
        ]);

        $this->token = json_decode($resp->getBody()->getContents())->access_token;
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
}
