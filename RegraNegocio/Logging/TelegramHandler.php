<?php
namespace Genesis\RegraNegocio\Logging;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\LogRecord;

class TelegramHandler extends AbstractProcessingHandler
{
    private string $token;
    private string $chatId;

    public function __construct($level = Logger::ERROR, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
        $this->token = getenv('TELEGRAM_BOT_TOKEN') ?: '';
        $this->chatId = getenv('TELEGRAM_CHAT_ID') ?: '';
    }

    protected function write(LogRecord $record): void
    {
        if (!$this->token || !$this->chatId) return;

        $message = $record->formatted ?? $record->message;

        $url = "https://api.telegram.org/bot{$this->token}/sendMessage";
        $data = [
            'chat_id' => $this->chatId,
            'text'    => $message,
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }
}
