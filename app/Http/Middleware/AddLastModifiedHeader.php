<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddLastModifiedHeader
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->header('Last-Modified', now()->toRfc7231String());
        return $response;
    }
}

?>