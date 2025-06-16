# RegraIdade

Exemplo de regra de negócio que valida a idade do usuário. Implementa `IRegraNegocio` e `ILog`.

## Exemplo de uso

```php
use Genesis\RegraNegocio\App\Rules\RegraIdade;
use Monolog\Logger;
use Monolog\Handler\NullHandler;

$regra = new RegraIdade();
$logger = new Logger('test');
$logger->pushHandler(new NullHandler());

$regra->setLogger($logger);
$regra->setParams(['idade' => 25]);
$regra->process();

if ($regra->hasError()) {
    print_r($regra->getErrors());
} else {
    print_r($regra->getResults());
}
```
