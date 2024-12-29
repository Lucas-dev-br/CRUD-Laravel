<?php

namespace App\Http\Controllers;

use App\Providers\ChatGPTService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChatGPTController extends Controller
{
    protected $chatGPTService;

    public function __construct(ChatGPTService $chatGPTService)
    {
        $this->chatGPTService = $chatGPTService;
    }

    public function ask(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|max:500',
        ]);

        try {
            $response = $this->chatGPTService->generateResponse($request->input('prompt'));
            
            return response()->json(['response' => $response]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
