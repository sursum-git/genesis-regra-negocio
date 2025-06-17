<?php
namespace Genesis\RegraNegocio\App\Rules;

use Genesis\RegraNegocio\Helpers\TraitRegraNegocio;
use Genesis\RegraNegocio\IRegraNegocio;
use Genesis\RegraNegocio\IRegraNegocioTRecord;


class TRecordRN implements IRegraNegocio , IRegraNegocioTRecord
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
