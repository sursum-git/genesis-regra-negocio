<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Genesis\BusinessRules\BusinessRuleProcessFlow;

$flow = new BusinessRuleProcessFlow();
$flow->addRuleScript([
    'class' => Genesis\BusinessRules\App\Rules\MinhaClasse::class,
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
