<?php
namespace ClickBus\Tests\Libraries\CashMachineTest;

use ClickBus\Libraries\CashMachine\Banknotes;

class BanknotesTest extends \PHPUnit_Framework_TestCase
{
    private $banknotes;

    public function setUp()
    {
        parent::setUp();
        $this->banknotes = new Banknotes();
    }

    public function testGetGreater()
    {
        $this->assertEquals(100, $this->banknotes->getGreater());

    }

    public function testFilterMaxValue()
    {
        $this->banknotes->filterMaxValue(10);
        $this->assertEquals(array(10), $this->banknotes->getBanknotes());
    }
}
