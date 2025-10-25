<?php
namespace Genesis\RegraNegocio;

interface IRegraNegocio {
    public function setParams(array $params): void;
    public function setLogger(\Psr\Log\LoggerInterface $logger): void;
    public function process(): mixed;
    public function getResults(): mixed;
    public function hasError(): bool;
    public function getErrors(): array;


}
