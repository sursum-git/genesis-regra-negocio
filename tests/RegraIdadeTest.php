<?php
use PHPUnit\Framework\TestCase;
use Genesis\BusinessRules\App\Rules\RegraIdade;
use Monolog\Logger;
use Monolog\Handler\NullHandler;

class RegraIdadeTest extends TestCase
{
    public function testIdadeValida()
    {
        $regra = new RegraIdade();
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $regra->setLogger($logger);
        $regra->setParams(['idade' => 25]);
        $regra->process();

        $this->assertFalse($regra->hasError());
        $this->assertEquals('Idade valida', $regra->getResults()['status']);
    }

    public function testIdadeInsuficiente()
    {
        $regra = new RegraIdade();
        $logger = new Logger('test');
        $logger->pushHandler(new NullHandler());

        $regra->setLogger($logger);
        $regra->setParams(['idade' => 15]);
        $regra->process();

        $this->assertTrue($regra->hasError());
        $this->assertContains('Idade insuficiente', $regra->getErrors());
    }
}
