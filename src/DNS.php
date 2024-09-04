<?php

namespace WebNIC;

use GuzzleHttp\Client;

class DNS
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function packages()
    {
        return new DNS\Packages($this->client);
    }

    public function product()
    {
        return new DNS\Product($this->client);
    }

    public function domains()
    {
        return new DNS\Domains($this->client);
    }
    public function domain(string $domain)
    {
        return new DNS\Domain($this->client, $domain);
    }

    public function countries()
    {
        return json_decode($this->client->get("dns/countries")->getBody()->getContents(), true)["data"];
    }
}
