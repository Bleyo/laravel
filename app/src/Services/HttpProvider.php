<?php

namespace App\src\Contracts;

use \Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\Factory;


class HttpProvider
{

    private array $userCredentials;

    private PendingRequest $pendingRequest;
    private Request $final;


    public function __construct(string $baseUrl)
    {
        $this->pendingRequest =
            Http::withBasicAuth(...$this->userCredentials)
            ->baseUrl($baseUrl)->acceptJson();
    }

    public function resolvePath(?string $url = '', ?array $options = [])
    {
        $this->final = $this->pendingRequest->get($url, $options);

        return Http::fake(function (Response $mock) {
            return [$this->final => $mock];
        });
    }
}
