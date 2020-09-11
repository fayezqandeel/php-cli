<?php
namespace Metro\Cli\Interfaces;

use Iterator;
use Metro\Cli\Interfaces\OfferInterface as OfferInterface;

/**
* Interface for The Collection class that contains Offers
*/

interface OfferCollectionInterface {

    /**
    * Add offer to the collection
    *
    * @param OfferInterface $offer
    * @return void
    */
    public function add(OfferInterface $offer): void;

    /**
    * Get offer at specific index
    *
    * @param int $index
    * @return OfferInterface
    */
    public function get(int $index): OfferInterface;

    /**
    * @return Iterator
    */
    public function getIterator(): Iterator;

}