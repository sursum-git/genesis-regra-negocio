<?php
namespace Genesis\RegraNegocio\App\Rules;

use Genesis\RegraNegocio\IRegraNegocio;
use Psr\Log\LoggerInterface;
use Genesis\RegraNegocio\Helpers\TraitLogRN;
use Genesis\RegraNegocio\TRecord;

class TRecordRN implements IRegraNegocio
{
    use TraitLogRN;

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
