<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Genesis\BusinessRules\App\Rules\MinhaClasse;

$params = json_decode($argv[1] ?? '{}', true);
$instance = new Genesis\BusinessRules\App\Rules\MinhaClasse();
$result = $instance->minhaValidacao($params);
echo json_encode($result);
