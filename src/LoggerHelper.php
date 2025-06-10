<?php
namespace Genesis\BusinessRules\Helpers;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;

trait LoggerHelper {
    private Logger $logger;

    public function initLogger(): void {
        $this->logger = new Logger('business');
        $this->logger->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));
        $this->logger->pushHandler(new BrowserConsoleHandler(Logger::DEBUG));
    }

    public function getLogger(): Logger {
        return $this->logger;
    }

    public function logInfoMessage(string $message, array $context = []): void {
        $this->logger->info($message, $context);
    }

    public function logErrorMessage(string $message, array $context = []): void {
        $this->logger->error($message, $context);
    }
}
