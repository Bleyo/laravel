<?php

namespace App\Services;

use \Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Client\Response;
use Closure;
use phpDocumentor\Reflection\Types\Self_;

class HttpClient
{
    /**
     * Handles mocking using service provider.
     *
     * In local environments the response is set
     *
     * @var Factory|Response
     */
    protected $http;


    /**
     * Request's target host -> mindaweb.pcitet.com
     *
     * @var string
     */
    protected static $host;


    /**
     * Hosts's path to action
     *
     * @var string $path
     */
    protected static $path;


    protected static $filters;


    public function __construct(Factory $factory)
    {
        $this->http = $factory;
    }

    public function getResponse()
    {
        $this->http->withBasicAuth(...$this->userCredentials)
            ->baseUrl($this->host)
            ->get($this->host, $this->query);
    }

    public function setHost(string $host): self
    {
        self::$host = $host;
        return $this;
    }


    /**
     * Sets path
     *
     * @param string $path
     * @return self
     */
    public function setPath(string $path = '/')
    {
        $this->path = $path;
        return $this;
    }

    public function params(array $parameter)
    {

        return $this;
    }
}
