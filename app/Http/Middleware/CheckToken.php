<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CheckToken extends Middleware
{
    protected function unauthenticated($request, array $guards)
    {
        throw new ApiException(
            'Unauthenticated.', 401
        );
    }
}
