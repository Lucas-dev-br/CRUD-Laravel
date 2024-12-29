<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;

class ChatGPTService
{
    protected $apiKey;
    protected $apiUrl;

    public function __construct()
    {
        $this->apiKey = config('services.openai.key');
        $this->apiUrl = config('services.openai.url');
        
    }

    public function generateResponse($prompt, $model = 'gpt-4o-mini', $maxTokens = 3000)
    {
        $assistantPrompt = "Você é um assistente jurídico altamente qualificado. Ajude os advogados com consultas legais, explicações de termos jurídicos, e estruturação de argumentos de acordo com as leis brasileiras.";
    
        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->apiUrl, [
            'model' => $model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $assistantPrompt,
                ],
                [
                    'role' => 'user',
                    'content' => $prompt,
                ],
            ],
            'max_tokens' => $maxTokens,
            'temperature' => 0.5,
        ]);
        
        if ($response->failed()) {
            throw new \Exception('Erro ao se conectar à API OpenAI: ' . $response->body());
        }
    
        $data = $response->json();

        return $data['choices'][0]['message']['content'];
    }
    
}
