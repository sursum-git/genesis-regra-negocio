<?php
namespace Genesis\BusinessRules\App\Rules;

class ValidadorFinanceiro
{
    public function validarScore(array $params): array
    {
        if (!isset($params['validacao']) || $params['validacao'] !== 'Idade aceita') {
            return ['error' => 'Score não pode ser validado sem idade válida'];
        }

        $score = $params['score'] ?? 0;
        if ($score >= 650) {
            return ['status' => 'Aprovado'];
        } else {
            return ['error' => 'Score muito baixo'];
        }
    }
}
