# TraitLogRN

Trait que provê uma implementação simples de logger utilizando Monolog. Pode ser reutilizada em diferentes regras ou serviços.

## Funcionalidades

- `initLogger()`: inicializa o logger com `StreamHandler` e `BrowserConsoleHandler`.
- `getLogger()`: retorna a instância de `Logger` criada.
- `logInfoMessage(string $mensagem, array $context = [])`: envia informações para o log.
- `logErrorMessage(string $mensagem, array $context = [])`: registra erros no log.

Ao usar a trait em uma classe, basta chamar `initLogger()` no início para habilitar o registro de logs.
