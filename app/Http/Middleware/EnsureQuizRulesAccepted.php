<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureQuizRulesAccepted
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->get('quiz_rules_accepted', false)) {
        return redirect()
            ->guest(route('rules.show'))
            ->with('warning', 'Zaakceptuj zasady przed rozpoczęciem quizu.');
        }

        return $next($request);
    }
}