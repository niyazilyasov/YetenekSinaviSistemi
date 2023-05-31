<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsurePasswordChanged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user() ||
            (! $request->user()->hasChangedPassword())) {
            return $request->expectsJson()
                ? abort(403, 'Your password has not changed since your account was created.')
                :redirect( route('password.reset', [
                    'token' => Password::createToken($request->user()),
                    'email' => $request->user()->getEmailForPasswordReset(),
                ], false));
        }

        return $next($request);
    }
}
