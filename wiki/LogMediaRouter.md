# LogMediaRouter

Classe responsável por mapear níveis de log para arquivos ou outros destinos.

## Uso

1. Crie uma instância da classe e defina os destinos com `map()`:

```php
$router = new Genesis\Logging\LogMediaRouter();
$router->map('info', __DIR__.'/logs/info.log');
$router->map('error', __DIR__.'/logs/error.log');
```

2. Utilize `getHandlers()` para obter uma lista de `StreamHandler` configurados e registrar em um `Logger` do Monolog.
