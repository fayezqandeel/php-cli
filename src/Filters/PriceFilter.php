<?php
namespace Metro\Cli\Filters;

use Iterator;
use ArrayObject;
use Metro\Cli\Interfaces\OfferFilterInterface as OfferFilterInterface;

class PriceFilter implements OfferFilterInterface {

    /**
     * filtered offers
     *
     * @var array
     */
    private $filtered = array();


     /**
     * start date parameter
     *
     * @var float
     */
    private $start;

    /**
     * end date parameter
     *
     * @var float
     */
    private $end;

    /**
     * get start paramter
     *
     * @return float
     */
    public function getStart(): float {
        return $this->start;
    }

    /**
     * set start paramter
     *
     * @param float $start
     * @return void
     */
    public function setStart(float $start): void {
        $this->start = $start;
    }

    /**
     * get end parameter
     *
     * @return float
     */
    public function getEnd(): float {
        return $this->end;
    }


    /**
     * set end parameter
     *
     * @param float $end
     * @return void
     */
    public function setEnd(float $end): void {
        $this->end = $end;
    }

    /**
     * filter offers by price range
     *
     * @param Iterator $iterator
     * @return void
     */
    public function filterOffers(Iterator $iterator): void {
        $iterator->rewind();
        while ($iterator->valid()) {
            $offer = $iterator->current();
            var_dump($this->getEnd() , $offer->getPrice());
            if (
                $offer->getPrice() >= $this->getStart() &&
                $offer->getPrice() <= $this->getEnd() &&
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