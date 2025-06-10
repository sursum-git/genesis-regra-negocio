# GenesisMultiLog

GenesisMultiLog é uma biblioteca PHP modular para execução de regras de negócio com:

- Execução sequencial e condicional
- Suporte a scripts com retorno JSON
- Relatórios em JSON e HTML
- Integração com Monolog
- Fluxos internos via PHP ou CLI

## Instalação

```bash
composer install
```

## Exemplo de Uso

```php
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
```

## Testes

```bash
vendor/bin/phpunit tests/
```

## Licença

MIT
