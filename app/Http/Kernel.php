<?php

protected $routeMiddleware = [
    'verify.gemini.api.key' => \App\Http\Middleware\VerifyGeminiApiKey::class,
];