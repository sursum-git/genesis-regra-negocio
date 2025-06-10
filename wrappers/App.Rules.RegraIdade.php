<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Genesis\BusinessRules\App\Rules\RegraIdade;

$params = json_decode($argv[1] ?? '{}', true);
$logger = new Monolog\Logger('wrapper');
$logger->pushHandler(new Monolog\Handler\StreamHandler('php://stdout'));

$regra = new RegraIdade();
$regra->setLogger($logger);
$regra->setParams($params);
$regra->process();

if ($regra->hasError()) {
    echo json_encode(['error' => $regra->getErrors()]);
    exit(1);
}

echo json_encode($regra->getResults());
