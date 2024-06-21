<?php

// app/Http/Middleware/VerifyGeminiApiKey.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyGeminiApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!env('GEMINI_API_KEY')) {
            return response()->json(['error' => 'Gemini API key is missing'], 403);
        }

        return $next($request);
    }
}

