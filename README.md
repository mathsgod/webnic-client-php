# WebNIC Client

[WebNIC](https://www.webnic.cc/) API Client for PHP


# install
```
composer require mathsgod/webnic-client-php
```

# usage

## Auth
```php
use WebNIC\Client;

$client = new Client('your-client-id', 'your-secret');

```


## DNS

### Check Whois
```php

print_r($client->domain()->whois('example.com'));

```
