# FluxoRegraNegocio

A classe `FluxoRegraNegocio` permite organizar e executar regras de negócio de forma sequencial ou condicional. É a porta de entrada para criação de fluxos.

## Métodos principais

- `addRuleScript($rule)`: adiciona um script ou definição de classe a ser executada.
- `setParams(array $params)`: define os parâmetros disponíveis para as regras.
- `execute()`: executa todos os scripts adicionados.
- `getResult()`: obtém os resultados de cada regra executada.
- `hasError()`: verifica se alguma regra retornou erro.
- `getErrors()`: lista os erros encontrados.

## Exemplo básico

```php
use Genesis\RegraNegocio\FluxoRegraNegocio;

$flow = new FluxoRegraNegocio();
$flow->addRuleScript('rules/validar_idade.php');
$flow->setParams(['idade' => 30]);
$flow->execute();

if ($flow->hasError()) {
    print_r($flow->getErrors());
} else {
    print_r($flow->getResult());
}
```
