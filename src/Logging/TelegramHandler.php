<?php
namespace Logging;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;

class TelegramHandler extends AbstractProcessingHandler
{
    private string $token;
    private string $chatId;

    public function __construct(string $token, string $chatId, $level = Logger::ERROR, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
        $this->token = $token;
        $this->chatId = $chatId;
    }

    protected function write(LogRecord $record): void
    {
        $message = $record->formatted ?? $record->message;

        $url = "https://api.telegram.org/bot{$this->token}/sendMessage";
        $data = [
            'chat_id' => $this->chatId,
            'text'    => $message,
        ];

        // Envio via cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }
}
