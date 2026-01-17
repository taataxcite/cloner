<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    protected string $botToken;
    protected string $chatId;
    protected string $apiUrl = 'https://api.telegram.org/bot';

    public function __construct()
    {
        $this->botToken = config('services.telegram.bot_token');
        $this->chatId = config('services.telegram.chat_id');
    }

    /**
     * Send a text message to the configured chat
     */
    public function sendMessage(string $message, ?string $chatId = null, string $parseMode = 'HTML'): array
    {
        $chatId = $chatId ?? $this->chatId;

        $response = Http::post($this->apiUrl . $this->botToken . '/sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => $parseMode,
        ]);

        if ($response->failed()) {
            Log::error('Telegram sendMessage failed', [
                'response' => $response->json(),
                'chat_id' => $chatId,
            ]);
        }

        return $response->json();
    }

    /**
     * Send a photo to the configured chat
     */
    public function sendPhoto(string $photoUrl, ?string $caption = null, ?string $chatId = null): array
    {
        $chatId = $chatId ?? $this->chatId;

        $data = [
            'chat_id' => $chatId,
            'photo' => $photoUrl,
        ];

        if ($caption) {
            $data['caption'] = $caption;
            $data['parse_mode'] = 'HTML';
        }

        $response = Http::post($this->apiUrl . $this->botToken . '/sendPhoto', $data);

        if ($response->failed()) {
            Log::error('Telegram sendPhoto failed', [
                'response' => $response->json(),
            ]);
        }

        return $response->json();
    }

    /**
     * Send a document to the configured chat
     */
    public function sendDocument(string $documentUrl, ?string $caption = null, ?string $chatId = null): array
    {
        $chatId = $chatId ?? $this->chatId;

        $data = [
            'chat_id' => $chatId,
            'document' => $documentUrl,
        ];

        if ($caption) {
            $data['caption'] = $caption;
            $data['parse_mode'] = 'HTML';
        }

        $response = Http::post($this->apiUrl . $this->botToken . '/sendDocument', $data);

        if ($response->failed()) {
            Log::error('Telegram sendDocument failed', [
                'response' => $response->json(),
            ]);
        }

        return $response->json();
    }

    /**
     * Get bot information
     */
    public function getMe(): array
    {
        $response = Http::get($this->apiUrl . $this->botToken . '/getMe');

        return $response->json();
    }

    /**
     * Set webhook URL for receiving updates
     */
    public function setWebhook(string $url): array
    {
        $response = Http::post($this->apiUrl . $this->botToken . '/setWebhook', [
            'url' => $url,
        ]);

        return $response->json();
    }

    /**
     * Delete webhook
     */
    public function deleteWebhook(): array
    {
        $response = Http::post($this->apiUrl . $this->botToken . '/deleteWebhook');

        return $response->json();
    }

    /**
     * Get webhook info
     */
    public function getWebhookInfo(): array
    {
        $response = Http::get($this->apiUrl . $this->botToken . '/getWebhookInfo');

        return $response->json();
    }
}
