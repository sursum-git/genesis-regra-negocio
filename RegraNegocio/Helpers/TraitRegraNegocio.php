<?php

namespace Helpers;

use Helpers\TraitLogRN;
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


}