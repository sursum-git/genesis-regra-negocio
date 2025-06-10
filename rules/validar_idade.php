<?php
require __DIR__ . '/../vendor/autoload.php';

use Genesis\BusinessRules\Helpers\LoggerHelper;

$params = json_decode($argv[1] ?? '{}', true);
$idade = $params['idade'] ?? null;

class IdadeRule {
    use LoggerHelper;
}

$log = new IdadeRule();
$log->initLogger();
$log->logInfoMessage("[validar_idade] Iniciando validação", $params);

if (!is_numeric($idade)) {
    $log->logErrorMessage("[validar_idade] Idade inválida");
    echo json_encode(['error' => 'Idade inválida']);
    exit(1);
}

if ($idade < 18) {
    $log->logErrorMessage("[validar_idade] Idade insuficiente: $idade");
    echo json_encode(['error' => 'Idade insuficiente']);
} else {
    $log->logInfoMessage("[validar_idade] Idade válida: $idade");
    echo json_encode(['result' => 'Idade válida']);
}
