# Laravel Secrets Demo

## Configuration
Set the following variables in the .env

`SECRETS_SERVER_URL` points to the Laravel Secrets server (use HTTPS in production)

`SECRETS_PUBLIC_KEY` path to public key generated on Laravel Secrets server

`SECRETS_SERVER_TOKEN` token generated on Laravel Secrets server


The public key and token are generated using `php artisan client:new` on the Laravel Secrets server

# syntax

Store secret
```
secrets(store, key, value);
```
Example:
```
secrets('myapp', 'private-token', 'qwerty1234567');
```


Retrieve secret
```
secrets(store, key);
```

Example:
```
secrets('myapp', 'private-token');
```



## Test Storage
app/Console/Commands/ClientStore.php
```
php artisan client:set
```

## Test Retrieval
app/Console/Commands/ClientRetrieve.php
```
php artisan client:get
```

