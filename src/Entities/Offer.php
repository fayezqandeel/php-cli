<?php

namespace Metro\Cli\Entities;

use Metro\Cli\Interfaces\OfferInterface as OfferInterface;


class Offer implements OfferInterface {

    /**
     * Price
     *
     * @var float
     */
    private $price;

    /**
     * Vendor Id
     *
     * @var integer
     */
    private $vendor_id;

    /**
     * Start Date
     *
     * @var string
     */
    private $start_date;

    /**
     * End Date
     *
     * @var string
     */
    private $end_date;

    /**
     * Quantity
     *
     * @var integer
     */
    private $quantity;



    /**
     * Construct Offer
     *
     * @param float $price
     * @param integer $vendor_id
     * @param integer $offer_start_date
     * @param integer $offer_end_date
     */
    public function __construct(
        float $price,
        int $vendor_id,
        string $start_date,
        string $end_date,
        int $quantity
    )
    {
        $this->price = $price;
        $this->vendor_id = $vendor_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->quantity = $quantity;
    }


    /**
     * get price
     *
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * set price
     *
     * @param float $price
     * @return void
     */
    public function setPrice(float $price): void{
        $this->price = $price;
    }
    
    /**
     * get vendor id
     *
     * @return integer
     */
    public function getVendorId(): int{
        return $this->vendor_id;
    }

    /**
     * set vendor id
     *
     * @param integer $vendor_id
     * @return void
     */
    public function setVendor_id(int $vendor_id): void {
        $this->vendor_id = $vendor_id;
    }

    /**
     * get offer start date
     *
     * @return string
     */
    public function getStartDate(): string {
        return $this->start_date;
    }

    /**
     * set offer start date
     *
     * @param string $start_date
     * @return void
     */
    public function setStartDate(string $start_date): void {
        $this->start_date = $start_date;
    }

    /**
     * get offer end date
     *
     * @return string
     */
    public function getEndDate(): string {
        return $this->end_date;
    }

    /**
     * set offer end date
     *
     * @param string $end_date
     * @return void
     */
    public function setEndDate(string $end_date): void {
        $this->end_date = $end_date;
    }

    /**
     * get offer quantity
     *
     * @return integer
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * set offer quantity
     *
     * @param integer $quantity
     * @return void
     */
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

}