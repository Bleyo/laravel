<?php

namespace App\src\User\Traits;

use Illuminate\Contracts\Auth\Authenticatable;

trait RequestsUser
{
    public function retrieveById($uid)
    {
        //
    }

    public function retrieveByToken($uid, $token)
    {
        //
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        //
    }

    public function retrieveByCredentials(array $credentials)
    {
        //
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        //
    }
}
