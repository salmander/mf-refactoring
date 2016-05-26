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
        /** @var float $totalAmount */
        $totalAmount = 0;

        /** @var int $frequentRenterPoints */
        $frequentRenterPoints = 0;

        /** @var array $rentals */
        $rentals = $this->rentals;

        /** @var string $result */
        $result = "Rental Record for " . $this->getName() . "\n";

        /** @var Rental $item */
        foreach ($rentals as $item) {
            
            $frequentRenterPoints += $item->getFrequentRenterPoints();
            //show figures for this rental
            $result .= "\t" . $item->getMovie()->getTitle() . "\t" . (string)$item->getCharge() . "\n";
            $totalAmount += $item->getCharge();
        }

        //add footer lines
        $result .= "Amount owed is " . (string)$totalAmount . "\n";
        $result .= "You earned " . (string)$frequentRenterPoints . " frequent renter points";
        return $result;
    }

}