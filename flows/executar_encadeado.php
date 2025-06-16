<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Genesis\RegraNegocio\FluxoRegraNegocio;

$flow = new FluxoRegraNegocio();
$flow->addRuleScript([
    'class' => Genesis\RegraNegocio\App\Rules\MinhaClasse::class,
    'method' => 'minhaValidacao',
    'params' => ['idade' => 30]
]);

$flow->addRuleScript([
    'class' => Genesis\RegraNegocio\App\Rules\ValidadorFinanceiro::class,
    'method' => 'validarScore',
    'params' => ['score' => 620]
]);

$flow->execute();

if ($flow->hasError()) {
    echo "Erros encontrados:\n";
    print_r($flow->getErrors());
} else {
    echo "Resultado final:\n";
    print_r($flow->getResult());
}
