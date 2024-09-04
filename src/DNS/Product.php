<?php

namespace WebNIC\DNS;

use GuzzleHttp\Client;

class Product
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function list()
    {
        $resp = $this->client->get("dns/product/list");
        return json_decode($resp->getBody()->getContents(), true);
    }
}
