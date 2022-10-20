# Laravel Secrets Demo

This is a demo client showing how to use to Laravel Secrets Server (https://github.com/kharysharpe/laravel-secrets-server) 

## Configuration
Set the following variables in the .env

`SECRETS_SERVER_URL` points to the Laravel Secrets server (use HTTPS in production)

`SECRETS_PUBLIC_KEY` path to public key generated on Laravel Secrets server

`SECRETS_SERVER_TOKEN` token generated on Laravel Secrets server


The public key and token are generated using `php artisan client:new` on the Laravel Secrets server

## Syntax

Store secret
```
secrets(store, key, value);
```
Example:
```
secrets('service-foo.private-token', 'qwerty1234567');
```


Retrieve secret
```
secrets(store, key);
```

Example:
```
secrets('service-foo.private-token');
```


## Sample Code
### Test Storage
app/Console/Commands/ClientStore.php
```
php artisan client:set
```

### Test Retrieval
app/Console/Commands/ClientRetrieve.php
```
php artisan client:get
```

