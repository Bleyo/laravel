<?php

namespace App\src\Services;

use \Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Client\Response;

class HttpClient
{
    /**
     * 2764's credentials
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


    /**
     * Creates instance
     *
     * @param string $hostUrl
     */
    public function __construct(string $hostUrl)
    {
        $this->request =
            Http::withBasicAuth(...$this->userCredentials)
            ->baseUrl($hostUrl)->acceptJson();
    }


    /**
     * Resolves request
     *
     * @param array $options
     * @return void
     */
    public function resolved(array $options)
    {
        if (App::environment('local')) {
            return $this->getRequest();
        }

        return $this->request->get($this->path, $options);
    }


    /**
     * Sets path
     *
     * @param string $path
     * @return self
     */
    public function setPath(string $path = '/'): self
    {
        $this->path = $path;
        return $this;
    }


    /**
     * Sets response
     *
     * @return void
     */
    private function setResponse()
    {
        return Http::fake(function (Response $mock) {
            return [$this->final => $mock];
        });
    }
}
