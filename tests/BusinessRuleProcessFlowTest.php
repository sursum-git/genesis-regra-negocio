<?php
use PHPUnit\Framework\TestCase;
use Genesis\BusinessRules\BusinessRuleProcessFlow;

class BusinessRuleProcessFlowTest extends TestCase {
    public function testFlowExecution() {
        $flow = new BusinessRuleProcessFlow();
        $flow->addRuleScript('rules/validar_idade.php');
        $flow->setParams(['idade' => 30]);
        $flow->execute();
        $this->assertFalse($flow->hasError());
        $this->assertNotEmpty($flow->getResult());
    }
}
