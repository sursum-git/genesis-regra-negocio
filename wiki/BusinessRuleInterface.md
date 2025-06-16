# IRegraNegocio

Interface que define o contrato para qualquer regra de negócio executada no fluxo.

## Métodos

- `setParams(array $params)`: recebe os parâmetros necessários para a regra.
- `setLogger(LoggerInterface $logger)`: injeta o logger usado durante o processamento.
- `process()`: executa a lógica da regra.
- `getResults()`: retorna o resultado calculado.
- `hasError()`: indica se houve erro na execução.
- `getErrors()`: retorna um array de mensagens de erro.

Implementações devem seguir essa interface para que o `FluxoRegraNegocio` consiga orquestrar as regras de maneira padronizada.
