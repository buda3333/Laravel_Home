<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public function webhook(Request $request)
    {
        $token = '6326667834:AAFgp0d3gJYQEJ7_CCtSNa0aJrV90Gw40_M';

// Чат ID (ID получателя сообщения)
        $chatId = '6326667834';

// Текст сообщения
        $message = 'Привет, это ваш бот!';

// Отправка сообщения
        $response = Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
        ]);

// Обработка ответа от Telegram API
        if ($response->ok()) {
            // Сообщение успешно отправлено
        } else {
            // Обработка ошибки отправки
        }
    }

}
