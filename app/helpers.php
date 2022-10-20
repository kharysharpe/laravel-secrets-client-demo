<?php

use Illuminate\Support\Facades\Http;
use Spatie\Crypto\Rsa\PublicKey;

function secrets($key, $value = null)
{
    $publicKey = PublicKey::fromFile(env('SECRETS_PUBLIC_KEY'));

    $hash = sha1($key . env('SECRETS_SALT'));

    if ($value) {
        $encryptedData = base64_encode($publicKey->encrypt($value));

        $http = Http::withToken(env('SECRETS_TOKEN'))
            ->acceptJson()
            ->post(
                env('SECRETS_SERVER_URL').'/api/v1/secrets',
                [
                    'key' => $hash,
                    'value' => $encryptedData,
                ]
            );

        return true;
    }

    $http = Http::withToken(env('SECRETS_TOKEN'))
        ->acceptJson()
        ->get(
            env('SECRETS_SERVER_URL')."/api/v1/secrets/{$hash}"
        );

    $response = json_decode((string) $http->getBody());

    if ($http->getStatusCode() == 200) {
        $decryptedData = null;

        if ($response->value != '') {
            $decryptedData = $publicKey->decrypt(base64_decode($response->value));
        }

        return $decryptedData;
    }

    throw(new RuntimeException('Secrets Server Error: '.$response->message, $http->getStatusCode()));
}
