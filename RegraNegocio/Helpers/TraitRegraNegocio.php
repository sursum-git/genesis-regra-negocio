<?php

namespace Genesis\RegraNegocio\Helpers;


use Genesis\RegraNegocio\Helpers\TraitLogRN;
use Psr\Log\LoggerInterface;

trait TraitRegraNegocio
{
    use TraitLogRN;

    private array $params = [];
    private mixed $results = null;
    private array $errors = [];

    public function setParams(array $params): void
    {
        $this->params = $params;
        $this->logInfoMessage('Parâmetros', ['parametros' => $params]);
    }

    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;

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

    public function getRecord():\stdClass
    {
        return $this->params['record'] ;
    }


}