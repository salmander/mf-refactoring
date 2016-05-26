<?php

class NewReleasePrice implements Price
{
    /**
     * @param int $daysRented
     * @return float
     */
    public function getCharge($daysRented)
    {
        return $daysRented * 3;
    }

    /**
     * @param $daysRented
     * @return int
     */
    public function getFrequentRenterPoints($daysRented)
    {
        if ($daysRented > 1) {
            return 2;
        }
        else {
            return 1;
        }
    }

    /**
     * @return int
     */
    public function getPriceCode()
    {
        return Movie::NEW_RELEASE;
    }


}