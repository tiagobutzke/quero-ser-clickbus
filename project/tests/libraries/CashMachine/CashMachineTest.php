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

    public function testWithdraw80()
    {
        $this->assertEquals(
            array(50, 20, 10),
            $this->cashMachine->withdraw(80)
        );
    }

    public function testWithdrawNull()
    {
        $this->assertEquals(
            array(),
            $this->cashMachine->withdraw(null)
        );
    }

    /**
     * @expectedException \ClickBus\Libraries\CashMachine\Exception\NoteUnavailableException
     */
    public function testWithdraw125Exception()
    {
        $this->cashMachine->withdraw(125);
    }

    /**
     * @expectedException \ClickBus\Libraries\CashMachine\Exception\InvalidArgumentException
     */
    public function testWithdrawNegativeException()
    {
        $this->cashMachine->withdraw(-130);
    }
}
