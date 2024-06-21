<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function prompt(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $prompt = $validatedData['comment'];
        $apiKey = env('GEMINI_API_KEY');
        $apiUrl = env('API_URL');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-goog-api-key' => $apiKey,
        ])->post($apiUrl, [
            'contents' => [
                ['parts' => [['text' => $prompt]]],
            ],
        ]);

        if ($response->successful()) {
            $jsonResponse = $response->json();
            $generatedText = $jsonResponse['candidates'][0]['content']['parts'][0]['text'] ?? 'No response generated';

            return view('welcome')->with('generatedText', $generatedText);
        } else {
            return ("Failed to get response from Gemini");
        }
    }
}
