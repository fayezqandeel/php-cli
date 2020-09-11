<?php
namespace Metro\Cli\Interfaces;

/**
* Interface the Data Transfer Object, that is representation of external JSON Data
*/
interface OfferInterface {
    /**
     * get price
     *
     * @return float
     */
    public function getPrice(): float;

    /**
     * set price
     *
     * @param float $price
     * @return void
     */
    public function setPrice(float $price): void;

    /**
     * get vendor id
     *
     * @return integer
     */
    public function getVendorId(): int;

    /**
     * set vendor id
     *
     * @param integer $vendor_id
     * @return void
     */
    public function setVendor_id(int $vendor_id): void;

    /**
     * get offer start date timestamps
     *
     * @return string
     */
    public function getStartDate(): string;

    /**
     * set offer start date timestamps
     *
     * @param string $start_date
     * @return void
     */
    public function setStartDate(string $start_date): void;

    /**
     * get offer end date timestamps
     *
     * @return string
     */
    public function getEndDate(): string;

    /**
     * set offer end date timestamps
     *
     * @param string $end_date
     * @return void
     */
    public function setEndDate(string $end_date): void ;

    /**
     * get offer quantity
     *
     * @return integer
     */
    public function getQuantity(): int;

    /**
     * set offer quantity
     *
     * @param integer $quantity
     * @return void
     */
    public function setQuantity(int $quantity): void;

}