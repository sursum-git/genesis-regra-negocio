<?php
namespace Genesis\Contracts;

use Psr\Log\LoggerInterface;

interface LoggableInterface {
    public function setLogger(LoggerInterface $logger): void;
    public function getLogger(): LoggerInterface;
}
