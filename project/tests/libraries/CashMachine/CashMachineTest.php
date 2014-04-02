<?php
namespace ClickBus\Tests\Libraries\CashMachineTest;

use ClickBus\Libraries\CashMachine\CashMachine;
use ClickBus\Libraries\CashMachine\Banknotes;

class CashMachineTest extends \PHPUnit_Framework_TestCase
{
    private $cashMachine;

    protected function setUp()
    {
        parent::setUp();
        $this->cashMachine = new CashMachine(
            new Banknotes()
        );
    }

    public function testWithdraw30()
    {
        $this->assertEquals(
            array(20, 10),
            $this->cashMachine->withdraw(30)
        );
    }
}
