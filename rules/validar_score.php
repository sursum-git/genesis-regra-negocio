<?php
require __DIR__ . '/../vendor/autoload.php';

use Genesis\RegraNegocio\Helpers\TraitLogRN;

$params = json_decode($argv[1] ?? '{}', true);
$score = $params['score'] ?? null;

class ScoreRule {
    use TraitLogRN;
}

$log = new ScoreRule();
$log->initLogger();
$log->logInfoMessage("[validar_score] Iniciando validação", $params);

if (!is_numeric($score)) {
    $log->logErrorMessage("[validar_score] Score inválido");
    echo json_encode(['error' => 'Score inválido']);
    exit(1);
}

if ($score < 600) {
    $log->logErrorMessage("[validar_score] Score muito baixo: $score");
    echo json_encode(['error' => 'Score muito baixo']);
} else {
    $log->logInfoMessage("[validar_score] Score válido: $score");
    echo json_encode(['result' => 'Score válido']);
}
