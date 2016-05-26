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
     * @var Price
     */
    private $price;

    /**
     * Movie constructor.
     * @param string $title
     * @param int $priceCode
     */
    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->setPriceCode($priceCode);
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
        return $this->price->getPriceCode();
    }

    /**
     * @param $priceCode
     * @throws Exception
     */
    public function setPriceCode($priceCode)
    {
        switch($priceCode) {
            case self::NEW_RELEASE:
                $this->price = new NewReleasePrice();
                break;
            case self::CHILDRENS:
                $this->price = new ChildrensPrice();
                break;
            case self::REGULAR:
                $this->price = new RegularPrice();
                break;
            default:
                throw new \Exception(sprintf("Invalid price code '%d'", $priceCode));
        }
    }

    /**
     * @param $daysRented
     * @return float
     */
    public function getCharge($daysRented)
    {
        return $this->price->getCharge($daysRented);
    }

    /**
     * @param $daysRented
     * @return int
     */
    public function getFrequentRenterPoints($daysRented)
    {
        return $this->price->getFrequentRenterPoints($daysRented);
    }


}