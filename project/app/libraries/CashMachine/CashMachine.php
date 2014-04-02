<?php
namespace ClickBus\Libraries\CashMachine;

use ClickBus\Libraries\CashMachine\Exception\NoteUnavailableException;
use ClickBus\Libraries\CashMachine\Exception\InvalidArgumentException;

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
        $this->validateValue($value);
        $this->verifyAvailability($value);

        $this->banknotes->descSort();

        while ($value > 0) {
            $this->banknotes->filterMaxValue($value);

            $banknote = max($this->banknotes->getBanknotes());
            $this->withdrawBanknotes[] = $banknote;
            $value -= $banknote;
        }

        return $this->withdrawBanknotes;
    }

    /**
     * Validate value passed to withdraw
     * 
     * @param float $value
     */
    private function validateValue($value)
    {
        if ($value != null && $value <= 0) {
            throw new InvalidArgumentException('The value is not acceptable.');
        }
    }

    /**
     * Verify if is notes available to withdraw in CashMachine
     * 
     * @param float $value
     */
    private function verifyAvailability($value)
    {
        $filtered = array_filter(
            $this->banknotes->getBanknotes(),
            function ($note) use ($value) {
                return ($value % $note === 0);
            }
        );

        if (count($filtered) == 0) {
            throw new NoteUnavailableException('Note available for this value.');
        }
    }
}
