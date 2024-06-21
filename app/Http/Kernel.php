<?php

protected $routeMiddleware = [
    // Other middleware
    'verify.gemini.api.key' => \App\Http\Middleware\VerifyGeminiApiKey::class,
    'web' => \App\Http\Middleware\VerifyCsrfToken::class,
];
