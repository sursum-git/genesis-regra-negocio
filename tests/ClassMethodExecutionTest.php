<?php
use PHPUnit\Framework\TestCase;
use Genesis\RegraNegocio\FluxoRegraNegocio;
use Genesis\RegraNegocio\App\Rules\MinhaClasse;

class ClassMethodExecutionTest extends TestCase {
    public function testExecuteMethod() {
        $flow = new FluxoRegraNegocio();
        $flow->addRuleScript([
            'class' => MinhaClasse::class,
            'method' => 'minhaValidacao',
            'params' => ['idade' => 20]
        ]);
        $flow->execute();
        $this->assertFalse($flow->hasError());
        $result = $flow->getResult();
        $this->assertEquals(['validacao' => 'Idade aceita'], $result[0]['retorno']);
    }
}
