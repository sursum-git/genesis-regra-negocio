<?php
namespace Genesis\BusinessRules\Helpers;

 use Monolog\Logger;
 use Monolog\Handler\StreamHandler;
 use Monolog\Handler\BrowserConsoleHandler;
 use Psr\Log\LoggerInterface;

trait LoggerHelper {
    private LoggerInterface $logger;

    public function initLogger(?LoggerInterface $logger = null): void {
        if ($logger !== null) {
            $this->logger = $logger;
            return;
        }
        $this->logger = new Logger('business');
        $this->logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
        $this->logger->pushHandler(new BrowserConsoleHandler(Logger::DEBUG));
    }

    public function getLogger(): LoggerInterface {
        return $this->logger;
    }

    public function logInfoMessage(string $message, array $context = []): void {
        $this->logger->info($message, $context);
    }

    public function logErrorMessage(string $message, array $context = []): void {
        $this->logger->error($message, $context);
    }
}
