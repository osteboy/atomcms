<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanImpersonateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $userId = (int)$request->route('id');

        if (!$request->route('id')) {
            return $next($request);
        }

        $user = User::select(['id', 'rank'])->whereId($userId)->firstOrFail();

        if ($user->id === Auth::id()) {
            return redirect()->back()->withErrors([
                'message' => __('You cannot impersonate yourself')
            ]);
        }

        if (hasPermission('impersonate_anyone')) {
            return $next($request);
        }

        if ($user->rank >= (int)setting('min_staff_rank')) {
            return redirect()->back()->withErrors([
                'message' => __('You cannot impersonate another staff member')
            ]);
        }

        return $next($request);
    }
}
