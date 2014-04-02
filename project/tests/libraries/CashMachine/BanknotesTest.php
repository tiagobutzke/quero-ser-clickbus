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

    public function testFilterMaxValue()
    {
        $this->banknotes->filterMaxValue(20);
        $this->assertEquals(array(20, 10), $this->banknotes->getBanknotes());
    }
}
