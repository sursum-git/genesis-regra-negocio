<?php
namespace App\Rules;

use Genesis\Contracts\BusinessRuleInterface;
use Genesis\Contracts\LoggableInterface;
use Psr\Log\LoggerInterface;

class ValidadorFinanceiro implements BusinessRuleInterface, LoggableInterface
{
    private array $params = [];
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
        $score = $this->params['score'] ?? null;

        if (!is_numeric($score)) {
            $this->errors[] = 'Score inválido ou ausente';
            $this->logger->error('Score inválido ou ausente');
            return;
        }

        if ($score < 600) {
            $this->errors[] = 'Score abaixo do mínimo permitido';
            $this->logger->error('Score abaixo do mínimo: ' . $score);
        } else {
            $this->result = ['status' => 'Score válido'];
            $this->logger->info('Score válido: ' . $score);
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
}
