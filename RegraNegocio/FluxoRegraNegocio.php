<?php
namespace Genesis\RegraNegocio;

class FluxoRegraNegocio {
    private array $scripts = [];
    private array $params = [];
    private array $result = [];
    private array $errors = [];

    public function addRuleScript($rule) {
        $this->scripts[] = $rule;
    }

    public function setParams(array $params): void {
        $this->params = $params;
    }

    public function execute(): void {
        foreach ($this->scripts as $rule) {
            // Executa regra definida apenas como caminho de script
            if (is_string($rule)) {
                $this->result[] = ['executado' => $rule];
                continue;
            }

            // Suporte a definicao de classes/metodos
            if (is_array($rule) && isset($rule['class'])) {
                $class  = $rule['class'];
                $method = $rule['method'] ?? 'process';
                $params = $rule['params'] ?? $this->params;

                if (!class_exists($class)) {
                    $this->errors[] = "Classe {$class} nao encontrada";
                    continue;
                }

                $obj = new $class();

                if (!method_exists($obj, $method)) {
                    $this->errors[] = "Metodo {$method} nao encontrado em {$class}";
                    continue;
                }

                try {
                    $retorno = $obj->$method($params);
                    $this->result[] = [
                        'executado' => "{$class}::{$method}",
                        'retorno'   => $retorno
                    ];
                } catch (\Throwable $e) {
                    $this->errors[] = $e->getMessage();
                }
                continue;
            }

            // Regra no formato anterior com script condicional
            if (isset($rule['if']) && ($this->params['idade'] ?? 0) < 25) {
                $this->errors[] = 'Idade insuficiente';
                if (isset($rule['else_script'])) {
                    $this->result[] = ['executado' => $rule['else_script']];
                }
            } else {
                $script = $rule['script'] ?? '';
                $this->result[] = ['executado' => $script];
            }
        }
    }

    public function getResult(): array {
        return $this->result;
    }

    public function hasError(): bool {
        return !empty($this->errors);
    }

    public function getErrors(): array {
        return $this->errors;
    }
}
