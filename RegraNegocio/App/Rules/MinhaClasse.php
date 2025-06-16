<?php
namespace Genesis\RegraNegocio\App\Rules;

class MinhaClasse
{
    public function minhaValidacao(array $params): array
    {
        $idade = $params['idade'] ?? null;

        if (!is_numeric($idade)) {
            return ['error' => 'Idade inválida'];
        }

        if ($idade < 18) {
            return ['error' => 'Idade inferior ao permitido'];
        }

        return ['validacao' => 'Idade aceita'];
    }
}
