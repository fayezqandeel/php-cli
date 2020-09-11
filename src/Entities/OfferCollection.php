<?php
namespace Metro\Cli\Entities;

use Iterator;

use Exception;
use ArrayObject;
use Metro\Cli\Logger\Logger as Logger;
use Metro\Cli\Entities\Offer as Offer;
use Metro\Cli\Interfaces\OfferInterface as OfferInterface;
use Metro\Cli\Interfaces\OfferCollectionInterface as OfferCollectionInterface;

class OfferCollection implements OfferCollectionInterface {

    public $logger;

    /**
     * offers array
     *
     * @var array
     */
    public $offers  = [];

    /**
     * construct offer collection
     *
     * @param array $offers
     */
    public function __construct(array $offers)
    {
        $this->logger = Logger::getInstance();
        $this->logger->info('Mapping data to offer collection');
        foreach ($offers as $key => $item) {
            $this->add(
                new Offer(
                    $item->price,
                    $item->vendor_id,
                    $item->start_date,
                    $item->end_date,
                    $item->quantity
                )
            );
        }
    }

    /**
     * add offer to collection
     *
     * @param OfferInterface $offer
     * @return void
     */
    public function add(OfferInterface $offer): void {
        $this->offers[] = $offer;
    }

    /**
     * get offer at specific index
     *
     * @param integer $index
     * @return OfferInterface
     */
    public function get(int $index): OfferInterface {
        if (array_key_exists($index, $this->offers)) {
            return $this->offers[$index];
        }
        throw new Exception('Out of index!');
    }

    /**
     * convert offer collections to Iterator
     *
     * @return Iterator
     */
    public function getIterator(): Iterator {
        $this->logger->info('getting collection offer iterator');
        $obj = new ArrayObject($this->offers);
        return $obj->getIterator();
    }

}