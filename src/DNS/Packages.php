<?php

namespace WebNIC\DNS;

use GuzzleHttp\Client;

class Packages
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function statistics()
    {
        $resp = $this->client->get("dns/packages/statistics");
        return json_decode($resp->getBody()->getContents(), true);
    }

    public function query(string $domain)
    {
        $resp = $this->client->get("dns/packages/query/$domain");
        return json_decode($resp->getBody()->getContents(), true);
    }
}
