<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Genesis\BusinessRules\App\Rules\ValidadorFinanceiro;

$params = json_decode($argv[1] ?? '{}', true);
$instance = new Genesis\BusinessRules\App\Rules\ValidadorFinanceiro();
$result = $instance->validarScore($params);
echo json_encode($result);
