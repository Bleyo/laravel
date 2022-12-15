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
     * @var array
     */
    private $userCredentials;

    /**
     * Pending request to host's root
     *
     * @var PendingRequest
     */
    private $request;



    public function __construct(string $hostUrl)
    {
        $this->request =
            Http::withBasicAuth(...$this->userCredentials)
            ->baseUrl($hostUrl)->acceptJson();
    }

    /**
     * Resolving pending request with given filters.
     *
     * @param array $options
     * @return Response
     */
    public function getResolved(array $options)
    {
        if (App::environment('local')) {
            return $this->getRequest();
        }

        return $this->request->get($this->path, $options);
    }

    /**
     * Set path / route of registered host
     *
     * @param string $url
     * @return self
     */
    public function setPath(string $path = '/'): self
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Response is defined in Service Providers.
     *
     * @return Response
     */
    private function getRequest()
    {
        return Http::fake(function (Response $mock) {
            return [$this->final => $mock];
        });
    }
}
