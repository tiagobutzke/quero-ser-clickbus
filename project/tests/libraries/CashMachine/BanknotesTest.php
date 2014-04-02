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

    public function testGetDescSorted()
    {
        $this->banknotes->descSort();
        $this->assertEquals(array(100, 50, 20, 10), $this->banknotes->getBanknotes());
    }
}
