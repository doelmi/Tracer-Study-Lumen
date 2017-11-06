<?php

namespace App\Http\Middleware;

use Closure;

class cors {

    public function handle($request, Closure $next) {
        return $next($request)
                        ->header('Access-Control-Allow-Origin', '*')
                        ->header('Access-Control-Allow-Methods', '*')
                        ->header('Access-Control-Allow-Headers', 'Accept, Content-Type,X-CSRF-TOKEN')
                        ->header('Access-Control-Allow-Credentials', 'true');
    }

}
