<?php
use PHPUnit\Framework\TestCase;
use Genesis\RegraNegocio\FluxoRegraNegocio;

class BusinessRuleProcessFlowTest extends TestCase {
    public function testFlowExecution() {
        $flow = new FluxoRegraNegocio();
        $flow->addRuleScript('rules/validar_idade.php');
        $flow->setParams(['idade' => 30]);
        $flow->execute();
        $this->assertFalse($flow->hasError());
        $this->assertNotEmpty($flow->getResult());
    }
}
