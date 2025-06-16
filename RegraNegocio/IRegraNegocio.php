<?php
namespace Genesis\RegraNegocio;

interface IRegraNegocio {
    public function setParams(array $params): void;
    public function setLogger(\Psr\Log\LoggerInterface $logger): void;
    public function process(): void;
    public function getResults(): mixed;
    public function hasError(): bool;
    public function getErrors(): array;
}
