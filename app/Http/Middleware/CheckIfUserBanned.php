<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\BannedUser;
use Carbon\Carbon;

class CheckIfUserBanned
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            return $next($request); // If not authenticated, let other middleware handle it.
        }

        $ban = BannedUser::where('user_id', $user->id)->first();

        if ($ban) {
            // If permanently banned (no expiry)
            if (is_null($ban->expires_at)) {
                $request->user()->tokens()->delete();
                return response()->json(['message' => 'Your account is permanently banned.'], 403);
            }

            // If temporarily banned
            if (Carbon::parse($ban->expires_at)->isFuture()) {
                $request->user()->tokens()->delete();
                return response()->json([
                    'message' => 'Your account is temporarily banned until ' . $ban->expires_at,
                ], 403);
            }
        }

        return $next($request);
    }
}

