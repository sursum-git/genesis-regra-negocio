# ILog

Interface auxiliar utilizada por classes que precisam disponibilizar um logger.

## Métodos

- `setLogger(LoggerInterface $logger)`: define a instância de logger usada.
- `getLogger(): LoggerInterface`: recupera o logger configurado.

É comum que regras de negócio implementem essa interface para manter um padrão de log entre as diversas operações.
