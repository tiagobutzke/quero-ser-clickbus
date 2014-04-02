<?php
namespace ClickBus\Libraries\CashMachine;

class CashMachine
{
    private $banknotes;

    private $withdrawBanknotes = array();

    public function __construct(Banknotes $banknotes)
    {
        $this->banknotes = $banknotes;
    }

    /**
     * Withdraw some money
     * 
     * @param float
     * 
     * @return array
     */
    public function withdraw($value)
    {
        $banknotes = $this->banknotes->getDescSorted();

        while ($value > 0) {
            $this->banknotes->filterMaxValue($value);

            $banknote = max($this->banknotes->getBanknotes());
            $this->withdrawBanknotes[] = $banknote;
            $value -= $banknote;
        }

        return $this->withdrawBanknotes;
    }
}
