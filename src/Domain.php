<?php

namespace WebNIC;

use GuzzleHttp\Client;

class Domain
{
    protected $client;
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function balance()
    {
        $resp = $this->client->get("domain/balance");
        return json_decode($resp->getBody()->getContents(), true)["data"];
    }

    public function historyLog(string $domain_name)
    {
        $resp = $this->client->get("domain/historyLog", [
            "query" => [
                "domainName" => $domain_name
            ]
        ]);
        return json_decode($resp->getBody()->getContents(), true)["data"];
    }

    public function whois(string $domain_name)
    {
        $resp = $this->client->get("domain/v2/whois", [
            "query" => [
                "domainName" => $domain_name,
            ]
        ]);
        return json_decode($resp->getBody()->getContents(), true)["data"];
    }

    public function privacy(string $domain_name)
    {
        $resp = $this->client->get("domain/privacy", [
            "query" => [
                "domainName" => $domain_name
            ]
        ]);
        return json_decode($resp->getBody()->getContents(), true);
    }

    public function query(string $domain_name)
    {
        $resp = $this->client->get("domain/v2/query", [
            "query" => [
                "domainName" => $domain_name
            ]
        ]);
        return json_decode($resp->getBody()->getContents(), true)["data"];
    }

    public function getRegistrantList(string $username)
    {
        $resp = $this->client->get("domain/v2/registrant/list", [
            "query" => [
                "username" => $username
            ]
        ]);
        return json_decode($resp->getBody()->getContents(), true)["data"];
    }

    public function queryContact(string $contact_id)
    {
        $resp = $this->client->get("domain/v2/contact/query", [
            "query" => [
                "contactId" => $contact_id
            ]
        ]);
        return json_decode($resp->getBody()->getContents(), true)["data"];
    }
}
