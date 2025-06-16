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
            $result = ['result' => '[simulado]'];
            if (isset($rule['if']) && $this->params['idade'] < 25) {
                $this->errors[] = 'Idade insuficiente';
                if (isset($rule['else_script'])) {
                    $this->result[] = ['executado' => $rule['else_script']];
                }
            } else {
                $this->result[] = ['executado' => is_array($rule) ? $rule['script'] : $rule];
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
