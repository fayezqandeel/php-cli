<?php
namespace Metro\Cli\Readers;

use Metro\Cli\Entities\OfferCollection as OfferCollection;
use Metro\Cli\Interfaces\ReaderInterface as ReaderInterface;
use Metro\Cli\Interfaces\OfferCollectionInterface as OfferCollectionInterface;

class JsonReader implements ReaderInterface {

    /**
     * read offers from json string
     *
     * @param string $input
     * @return OfferCollectionInterface
     */
    public function read(string $input): OfferCollectionInterface {
        return new OfferCollection(json_decode($input));
    }
}