<?php

namespace App\src\Contracts;

use Illuminate\Http\Client\Response;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

interface UserFactory extends UserProvider, Authenticatable
{
    public function retrieveById($uid);

    public function retrieveByToken($uid, $token);

    public function updateRememberToken(Authenticatable $user, $token);

    public function retrieveByCredentials(array $credentials);

    public function validateCredentials(Authenticatable $user, array $credentials);

    public function getAuthIdentifierName();

    public function getAuthIdentifier();

    public function getAuthPassword();

    public function getRememberToken();

    public function setRememberToken($value);

    public function getRememberTokenName();
}
