<?php
namespace Genesis\RegraNegocio;

use Psr\Log\LoggerInterface;

interface ILog {
    public function setLogger(LoggerInterface $logger): void;
    public function getLogger(): LoggerInterface;
}
