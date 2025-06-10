<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/BusinessRuleProcessFlow.php';

use Genesis\BusinessRules\BusinessRuleProcessFlow;

$flow = new BusinessRuleProcessFlow();
$flow->addRuleScript('rules/validar_idade.php');
$flow->addRuleScript([
    'script' => 'rules/validar_score.php',
    'if' => ['idade' => ['>=' => 25]],
    'else_script' => 'rules/negado_score.php'
]);

$params = ['idade' => 23, 'score' => 580];
$flow->setParams($params);
$flow->execute();

if ($flow->hasError()) {
    echo "Erros:\n";
    print_r($flow->getErrors());
} else {
    echo "Resultado:\n";
    print_r($flow->getResult());
}
