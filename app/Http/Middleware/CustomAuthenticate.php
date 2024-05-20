<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class CustomAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $credentials = $request->only('matric_number', 'date_of_birth');

        // Fetch the user based on the matric_number
        $user = User::where('matric_number', $credentials['matric_number'])->first();

        if ($user && $user->date_of_birth == $credentials['date_of_birth']) {
            // Log the user in manually
            Auth::login($user);

            return $next($request);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Invalid credentials'
            ], 401);
        }
    }
}
