<?php

namespace App\src\Contracts;

use Illuminate\Http\Client\Response;

interface HttpClient
{

    /**
     * Resolving pending request with given filters.
     *
     * Fakes response for local environment.
     *
     * @param array $options
     * @return Response
     */
    public function resolve(array $options);

    /**
     * Set path for defined url http://domain.com/path
     *
     * @param string $url
     * @return self
     */
    public function withPath(string $path = '/');


    /**
     * Mocks request's response, local environment.
     *
     * Injected by Service Container
     *
     * @return Response
     */
    public function fakeRequest();
}
