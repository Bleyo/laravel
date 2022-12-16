<?php

namespace App\src\User\Contracts;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;


interface Authentication extends Authenticatable, UserProvider
{
}
