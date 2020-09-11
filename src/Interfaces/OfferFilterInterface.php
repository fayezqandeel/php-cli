<?php
namespace Metro\Cli\Interfaces;

use Iterator;

/**
* Interface for offers filtering
*/
interface OfferFilterInterface {
    /**
     * Filter offers
     *
     * @param Iterator $iterator
     * @return void
     */
    public function filterOffers(Iterator $iterator): void;
    
    /**
     * count filtered offers
     *
     * @return integer
     */
    public function count(): int;
}