<?php

namespace WebNIC;

use GuzzleHttp\Client;

class Reseller
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function balance()
    {
        $resp = $this->client->get("reseller/v2/balance");
        return json_decode($resp->getBody()->getContents(), true)["data"]["balance"];
    }
}
