<?php

namespace App\src\Services;

use \Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Client\Response;

class HttpClient
{
    /**
     * Tech user's BasicAuth creds.
     *
     * Inject by Service Container.
     *
     * @var array
     */
    private array $userCredentials;

    /**
     * Pending request to host's root
     *
     * @var PendingRequest
     */
    private PendingRequest $request;



    public function __construct(string $hostUrl)
    {
        $this->request =
            Http::withBasicAuth(...$this->userCredentials)
            ->baseUrl($hostUrl)->acceptJson();
    }

    /**
     * Resolving pending request with given filters.
     * Fakes response for local environment.
     *
     * @param array $options
     * @return Response
     */
    public function resolve(array $options)
    {
        if (App::environment('local')) {
            return $this->fakeRequest();
        }

        return $this->request->get($this->path, $options);
    }

    /**
     * Set path / route of registered host
     *
     * @param string $url
     * @return self
     */
    public function withPath(string $path = '/'): self
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Response is defined in Service Providers.
     *
     * Depends on use case implementations of client.
     *
     * @return Response
     */
    private function fakeRequest()
    {
        return Http::fake(function (Response $mock) {
            return [$this->final => $mock];
        });
    }
}
