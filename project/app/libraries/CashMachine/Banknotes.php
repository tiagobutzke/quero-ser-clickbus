<?php
namespace ClickBus\Libraries\CashMachine;

class Banknotes
{
    /**
     * Banknotes available
     * 
     * @var array
     */
    private $banknotes = array(10, 20, 50, 100);

    /**
     * Set banknotes
     * 
     * @param array $banknotes
     */
    public function setBanknotes(array $banknotes)
    {
        $this->banknotes = $banknotes;
    }

    /**
     * Get banknotes
     * 
     * @return array
     */
    public function getBanknotes()
    {
        return $this->banknotes;
    }

    /**
     * Filter max value to banknotes
     * 
     * @param float $max
     */
    public function filterMaxValue($max)
    {
        $this->banknotes = array_filter(
            $this->banknotes,
            function ($var) use ($max) {
                return ($var <= $max);
            }
        );
    }


    /**
     * Get note values desc sorted
     * 
     * @return array
     */
    public function getDescSorted()
    {
        rsort($this->banknotes);

        return $this->banknotes;
    }
}
