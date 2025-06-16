<?php
namespace Helpers;

 use Monolog\Logger;
 use Monolog\Handler\StreamHandler;
 use Logging\TelegramHandler;
 use Psr\Log\LoggerInterface;

trait TraitLogRN
{
    protected LoggerInterface $logger;

    public function initLogger(array $options = [], ?LoggerInterface $logger = null): void
    {
        $name = $options['name'] ?? 'genesis';
        if ($logger !== null) {
            $this->logger = $logger;

        }else{
            $this->logger = new Logger($name);
        }
        $logLevel = $options['level'] ?? Logger::DEBUG;


        $this->logger->pushHandler(new StreamHandler('php://stdout', $logLevel));

        // Suporte ao Telegram (opcional)
        if (!empty($options['telegram_token']) && !empty($options['telegram_chat_id'])) {
            $this->logger->pushHandler(
                new TelegramHandler($options['telegram_token'], $options['telegram_chat_id'], Logger::ERROR)
            );
        }
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    public function logInfoMessage(string $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    public function logErrorMessage(string $message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }
}
