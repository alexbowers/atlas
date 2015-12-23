<?php namespace App\Http\Middleware;

use Closure;

/**
 * Secure
 * Redirects any non-secure requests to their secure counterparts.
 *
 * @source https://laracasts.com/discuss/channels/tips/secure-middleware-for-laravel-5
 *
 * @param request The request object.
 * @param $next The next closure.
 * @return redirects to the secure counterpart of the requested uri.
 */
class Secure
{
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && app()->environment('production')) {
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);
    }
}