<?php
namespace Metro\Cli\Filters;

use Iterator;
use ArrayObject;
use Metro\Cli\Logger\Logger as Logger;
use Metro\Cli\Entities\Offer as Offer;
use Metro\Cli\Interfaces\OfferFilterInterface as OfferFilterInterface;

class DateFilter implements OfferFilterInterface {

    public $logger;

    /**
     * filtered offers
     *
     * @var array
     */
    public $filtered = array();

    /**
     * start date parameter
     *
     * @var string
     */
    private $start;

    /**
     * end date parameter
     *
     * @var string
     */
    private $end;

    public function __construct()
    {
        $this->logger = Logger::getInstance();
        $this->logger->info('Start filtering by date...');
    }

    /**
     * get start paramter
     *
     * @return string
     */
    public function getStart(): string {
        return $this->start;
    }

    /**
     * set start paramter
     *
     * @param string $start
     * @return void
     */
    public function setStart(string $start): void {
        $this->start = $start;
    }

    /**
     * get end parameter
     *
     * @return string
     */
    public function getEnd(): string {
        return $this->end;
    }


    /**
     * set end parameter
     *
     * @param string $end
     * @return void
     */
    public function setEnd(string $end): void {
        $this->end = $end;
    }

    /**
     * filter offers by date range
     *
     * @param Iterator $iterator
     * @return void
     */
    public function filterOffers(Iterator $iterator): void {
        $iterator->rewind();
        while ($iterator->valid()) {
            $offer = $iterator->current();
            if (
                strtotime($offer->getStartDate()) >= strtotime($this->getStart()) &&
                strtotime($offer->getEndDate()) <= strtotime($this->getEnd()) &&
                $offer->getQuantity() > 0
            ) {
                $this->filtered[] = $offer;
                print_r($offer);
            }
            $iterator->next();
        }
        $this->logger->success('found ' . count($this->filtered) . 'matches');
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