<?php

class Movie
{
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $priceCode;

    /**
     * Movie constructor.
     * @param string $title
     * @param int $priceCode
     */
    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPriceCode()
    {
        return $this->priceCode;
    }

    /**
     * @param int $priceCode
     */
    public function setPriceCode($priceCode)
    {
        $this->priceCode = $priceCode;
    }

    /**
     * @param $daysRented
     * @return float
     */
    public function getCharge($daysRented)
    {
        $result = 0;

        switch ($this->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($daysRented > 2) {
                    $result += ($daysRented - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += $daysRented * 3;
                break;
            case Movie::CHILDRENS:
                $result += 1.5;
                if ($daysRented > 3) {
                    $result += ($daysRented - 3) * 1.5;
                }
                break;
        }
        return $result;
    }

    /**
     * @param $daysRented
     * @return int
     */
    public function getFrequentRenterPoints($daysRented)
    {
        if (($this->getPriceCode() == Movie::NEW_RELEASE) && $daysRented > 1) {
            return 2;
        }
        else {
            return 1;
        }
    }

}