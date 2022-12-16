<?php

namespace App\src\Contracts;

use Illuminate\Http\Client\Response;

interface HttpContract
{
    /**
     * Resolving pending request with given filters.
     * Fakes response for local environment.
     *
     * @param array $options
     * @return Response
     */
    public function resolve(array $options): Response;


    /**
     * Sets a path for the defined host
     *
     * @param string $url
     * @return self
     */
    public function setPath(string $path = '/');


    /**
     * Mocks request's response, the response may be
     * modified thru HttpServiceProvider.
     *
     * @return Response
     */
    public function setResponse();
}
