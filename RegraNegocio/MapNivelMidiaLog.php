<?php
namespace Genesis\RegraNegocio;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MapNivelMidiaLog {
    private array $routes = [];

    public function map(string $level, string $mediaPath): void {
        $this->routes[$level][] = $mediaPath;
    }

    public function getHandlers(): array {
        $handlers = [];
        foreach ($this->routes as $level => $mediaList) {
            foreach ($mediaList as $media) {
                $handlers[] = new StreamHandler($media, Logger::toMonologLevel($level));
            }
        }
        return $handlers;
    }
}
