<?php
namespace Genesis\RegraNegocio\App\Rules;

use Genesis\RegraNegocio\Helpers\TraitRegraNegocio;
use Genesis\RegraNegocio\IRegraNegocio;


class TRecordRN implements IRegraNegocio
{
   use TraitRegraNegocio;


    public function process(): void
    {
        try {
            $record = $this->params['record'] ?? null;
            if ($record === null) {
                throw new \InvalidArgumentException('Parametro record ausente');
            }
            $this->results = ['record' => $record];
            $this->logInfoMessage('Registro processado', ['record' => $record]);
        } catch (\Throwable $e) {
            $this->errors[] = $e->getMessage();
            $this->logErrorMessage($e->getMessage(), ['exception' => $e]);
            throw $e;
        }
    }






}
