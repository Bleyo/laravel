<?php

use Illuminate\Auth\Authenticatable;

trait UserTrait
{
    public function retrieveById(string $uid)
    {
        //
    }

    public function retrieveByToken(string $uid, $token)
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
