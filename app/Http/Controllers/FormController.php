<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FormController extends Controller
{
    public function store(Request $request)
    {
        $val = $request->val;

        $apiKey = env('OPENAI_API_KEY');

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a friendly bot.'],
                    ['role' => 'user', 'content' => 'buatkan list persyaratan' . $val],
                ],
                'max_tokens' => 50,
            ]);

//            return response()->json($response->json());
            $content = $response['choices'][0]['message']['content'];
            return response()->json(['response' => $content]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
