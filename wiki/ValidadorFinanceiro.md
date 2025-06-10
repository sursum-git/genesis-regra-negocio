# ValidadorFinanceiro

Classe de exemplo para validação de score financeiro do cliente.

## Exemplo de uso

```php
use Genesis\BusinessRules\App\Rules\ValidadorFinanceiro;
use Monolog\Logger;
use Monolog\Handler\NullHandler;

$regra = new ValidadorFinanceiro();
$logger = new Logger('test');
$logger->pushHandler(new NullHandler());

$regra->setLogger($logger);
$regra->setParams(['score' => 700, 'validacao' => 'Idade aceita']);
$regra->process();

if ($regra->hasError()) {
    print_r($regra->getErrors());
} else {
    print_r($regra->getResults());
}
```
