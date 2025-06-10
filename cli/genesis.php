<?php
require_once __DIR__ . '/../src/BusinessRuleProcessFlow.php';

use Genesis\BusinessRules\BusinessRuleProcessFlow;

$flow = new BusinessRuleProcessFlow();
$flow->addRuleScript('rules/validar_idade.php');
$flow->addRuleScript([
    'script' => 'rules/validar_score.php',
    'if' => ['idade' => ['>=' => 25]],
    'else_script' => 'rules/negado_score.php'
]);

$flow->setParams(['idade' => 22, 'score' => 500]);
$flow->execute();
print_r($flow->getResult());
