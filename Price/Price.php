<?php

interface Price
{
    public function getCharge($daysRented);
    public function getFrequentRenterPoints($daysRented);
    public function getPriceCode();
}