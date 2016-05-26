<?php

class RegularPrice implements Price
{
    /**
     * @param $daysRented
     * @return int
     */
    public function getCharge($daysRented)
    {
        $result = 2;
        if ($daysRented > 2) {
            $result += ($daysRented - 2) * 1.5;
        }
        return $result;
    }

    /**
     * @param $daysRented
     * @return int
     */
    public function getFrequentRenterPoints($daysRented)
    {
        return 1;
    }

    /**
     * @return int
     */
    public function getPriceCode()
    {
        return Movie::REGULAR;
    }


}