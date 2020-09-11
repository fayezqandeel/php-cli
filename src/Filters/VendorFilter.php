<?php
namespace Metro\Cli\Filters;

use Iterator;
use ArrayObject;
use Metro\Cli\Interfaces\OfferFilterInterface as OfferFilterInterface;

class VendorFilter implements OfferFilterInterface {

    /**
     * filtered offers
     *
     * @var array
     */
    private $filtered = array();

    /**
     * vendor id parameter
     *
     * @var int
     */
    public $id;

    /**
     * get vendor id
     *
     * @return integer
     */
    public function getId(): int{
        return $this->id;
    }

    /**
     * set vendor id
     *
     * @param integer $id
     * @return void
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * filter offers by vendor id
     *
     * @param Iterator $iterator
     * @return void
     */
    public function filterOffers(Iterator $iterator): void {
        $iterator->rewind();
        while ($iterator->valid()) {
            $offer = $iterator->current();
            if (
                $offer->getVendorId() == $this->id &&
                $offer->getQuantity() > 0
            ) {
                $this->filtered[] = $offer;
                print_r($offer);
            }
            $iterator->next();
        }
    }

    /**
     * count filtered results
     *
     * @return int
     */
    public function count(): int {
        return count($this->filtered);
    }
}