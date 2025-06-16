<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Genesis\RegraNegocio\FluxoRegraNegocio;

$flow = new FluxoRegraNegocio();
$flow->addRuleScript([
    'class' => Genesis\RegraNegocio\App\Rules\MinhaClasse::class,
    'method' => 'minhaValidacao',
    'params' => ['idade' => 17]
]);
$flow->addRuleScript('rules/validar_score.php');

$flow->setParams(['score' => 700]);
$flow->execute();

if ($flow->hasError()) {
    print_r($flow->getErrors());
} else {
    print_r($flow->getResult());
}
