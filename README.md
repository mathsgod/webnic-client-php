# WebNIC Client PHP

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

print_r($client->dns->whois('example.com'));

```
