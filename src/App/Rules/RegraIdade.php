<?php
namespace Genesis\BusinessRules\App\Rules;

use Genesis\BusinessRules\BusinessRuleInterface;
use Genesis\BusinessRules\LoggableInterface;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class RegraIdade implements BusinessRuleInterface, LoggableInterface
{
    private array $params;
    private LoggerInterface $logger;
    private array $result = [];
    private array $errors = [];

    public function setParams(array $params): void {
        $this->params = $params;
    }

    public function setLogger(LoggerInterface $logger): void {
        $this->logger = $logger;
    }

    public function process(): void {
        if (!isset($this->params['idade'])) {
            $this->errors[] = 'Idade ausente';
            $this->logger->error('Idade nao fornecida');
            return;
        }

        $idade = $this->params['idade'];
        if ($idade < 18) {
            $this->errors[] = 'Idade insuficiente';
            $this->logger->error('Idade insuficiente: ' . $idade);
        } else {
            $this->result = ['status' => 'Idade valida'];
            $this->logger->info('Idade valida: ' . $idade);
        }
    }

    public function getResults(): mixed {
        return $this->result;
    }

    public function hasError(): bool {
        return !empty($this->errors);
    }

    public function getErrors(): array {
        return $this->errors;
    }

    public function getLogger(): LoggerInterface
    {
        // TODO: Implement getLogger() method.
        return new Logger('provisorio');
    }
}
