<?php

namespace WebNIC\DNS;

use GuzzleHttp\Client;

class Domain
{

    protected $client;
    protected $domain;
    public function __construct(Client $client, string $domain)
    {
        $this->client = $client;
        $this->domain = $domain;
    }

    public function records()
    {
        $resp = $this->client->get("dns/domains/{$this->domain}/records");
        return json_decode($resp->getBody()->getContents(), true)["data"];
    }
}
