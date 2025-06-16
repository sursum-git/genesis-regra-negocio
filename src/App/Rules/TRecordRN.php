<?php
namespace Genesis\BusinessRules\App\Rules;

use Genesis\BusinessRules\BusinessRuleInterface;
use Psr\Log\LoggerInterface;
use Genesis\BusinessRules\Helpers\LoggerHelper;
use Genesis\BusinessRules\TRecord;

class TRecordRN implements BusinessRuleInterface
{
    use LoggerHelper;

    private array $params = [];
    private mixed $results = null;
    private array $errors = [];

    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    public function process(): void
    {
        try {
            $record = $this->params['record'] ?? null;
            if ($record === null) {
                throw new \InvalidArgumentException('Parametro record ausente');
            }
            $this->results = ['record' => $record];
            $this->logInfoMessage('Registro processado', ['record' => $record]);
        } catch (\Throwable $e) {
            $this->errors[] = $e->getMessage();
            $this->logErrorMessage($e->getMessage(), ['exception' => $e]);
            throw $e;
        }
    }

    public function getResults(): mixed
    {
        return $this->results;
    }

    public function hasError(): bool
    {
        return !empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getTRecord(): TRecord
    {
        return new TRecord($this->params['record'] ?? []);
    }
}
