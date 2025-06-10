<?php
require __DIR__ . '/../vendor/autoload.php';

use Genesis\BusinessRules\Helpers\LoggerHelper;

$params = json_decode($argv[1] ?? '{}', true);

class NegadoScore {
    use LoggerHelper;
}

$log = new NegadoScore();
$log->initLogger();
$log->logInfoMessage("[negado_score] Regra executada para usuários com idade < 25", $params);

echo json_encode(['error' => 'Fluxo negado por idade']);
