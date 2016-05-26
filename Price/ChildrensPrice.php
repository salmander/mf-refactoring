<?php

class ChildrensPrice implements Price
{
    /**
     * @param $daysRented
     * @return float
     */
    public function getCharge($daysRented)
    {
        $result = 1.5;
        if ($daysRented > 3) {
            $result += ($daysRented - 3) * 1.5;
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
        return Movie::CHILDRENS;
    }

}