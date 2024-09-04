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
}
