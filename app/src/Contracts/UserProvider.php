<?php

namespace App\src\Contracts;

use Illuminate\Http\Client\Request;

interface UserProvider
{
    public function request(Request $request);
}
