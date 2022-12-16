<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Hashing\HashManager;
use Illuminate\Auth\AuthManager;
use App\src\User\Traits\RequestsUser;
use App\src\User\Traits\RequestsPlatform;
use App\src\User\Contracts\Authentication;

class UserProvider implements Authentication
{
    use RequestsUser, RequestsPlatform;

    /**
     * platform's response for given user.
     *
     * @var Response
     */
    private $response;
    /**
     * json_decode user data
     *
     * @var array
     */
    private array $attributes;

    private $authManager;

    private $hashManager;


    public function __construct(
        AuthManager $authManager,
        HashManager $hashManager,
    ) {
        $this->authManager = $authManager;
        $this->hashManager = $hashManager;

        $this->response = (new HttpClient())
            ->setHost(config('auth.host'))
            ->setPath(config('host.path'));
    }

    public function requestPlatform(string $userId)
    {
        return $this->httpClient->getResponse(['uid' => $userId]);
    }


    public function getAttributes()
    {
        $this->attributes = $this->response->body();
        return $this->attributes;
    }
}
