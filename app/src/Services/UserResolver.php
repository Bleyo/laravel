<?php

use Illuminate\Foundation\Auth\User;

class UserResolver
{
     $attributes = $client
                    ->setPath('/v2/users')
                    ->getResolved(['uid' => $user]);
                return new GenericUser($attributes)
                    $resolver
                    ->setPath('/v2/users')
                    ->getResolved(['uid' => $user]);
}
