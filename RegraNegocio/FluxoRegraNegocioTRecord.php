<?php

namespace Genesis\RegraNegocio;
use Psr\Log\LoggerInterface;

class FluxoRegraNegocioTRecord
{
    private $logParar = false;
    private array $params = [];
    private $regras = array() ;
    private array $errors = [];

    private $logger;

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function incluirRegra( IRegraNegocioTRecord $classe)
    {
           $this->regras[] = $classe;
    }
    public function getRegras()
    {
        return $this->regras;
    }

    public function setParams(array $params): void {
        $this->params = $params;
    }
    public function setPararComErro($logParar)
    {
        $this->logParar = $logParar;
    }
    public function process()
    {
        foreach ($this->regras as $regra) {
            $regra->setParams($this->params);
            if($this->logger){
                $regra->setLogger($this->logger);
            }
            $regra->process();

            if ($regra->hasError()) {
                $this->errors[] = $regra->getErrors();
                if($this->logParar){
                    return;
                }
            }else{
                $this->params = $regra->getResults();
            }
        }
    }
    public function getErrors()
    {
        return $this->errors;
    }
    public function getResults()
    {
        return $this->params;
    }

}