<?php

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array Rental[]
     */
    private $rentals;

    /**
     * Customer constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    public function statement()
    {
        /** @var string $result */
        $result = "Rental Record for " . $this->getName() . "\n";

        /** @var Rental $item */
        foreach ($this->rentals as $rental) {
            //show figures for this rental
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . (string)$rental->getCharge() . "\n";
        }

        //add footer lines
        $result .= "Amount owed is " . (string)$this->getTotalCharge() . "\n";
        $result .= "You earned " . (string)$this->getTotalFrequentRenterPoints() . " frequent renter points";
        return $result;
    }

    private function getTotalCharge()
    {
        /** @var float $totalAmount */
        $totalAmount = 0;

        /** @var Rental $item */
        foreach ($this->rentals as $rental) {
            $totalAmount += $rental->getCharge();
        }

        return $totalAmount;
    }

    private function getTotalFrequentRenterPoints()
    {
        /** @var int $frequentRenterPoints */
        $frequentRenterPoints = 0;

        /** @var Rental $item */
        foreach ($this->rentals as $rental) {
            $frequentRenterPoints += $rental->getFrequentRenterPoints();
        }

        return $frequentRenterPoints;
    }

    public function htmlStatement()
    {
        $result = "<H1>Rentals for <EM>" . $this->getName() . "</EM></H1><P>\n";

        foreach ($this->rentals as $rental) {
            //show figures for each rental
            $result .= $rental->getMovie()->getTitle() . ": " . (string)($rental->getCharge()) . "<BR>\n";
        }

        //add footer lines
        $result .= "<P>You owe <EM>" . (string)$this->getTotalCharge() . "</EM><P>\n";
        $result .= "On this rental you earned <EM>" .(string)$this->getTotalFrequentRenterPoints() . "</EM> frequent renter points<P>";
        return $result;
    }

}