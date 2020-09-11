<?php

namespace Metro\Cli;

use Metro\Cli\Interfaces\ReaderInterface as ReaderInterface;



class App
{
    public $reader;

    /**
     * set reader
     *
     * @param ReaderInterface $reader
     */
    public function __construct(ReaderInterface $reader)
    {
        $this->setReader($reader);
    }

    /**
     * get reader
     *
     * @return ReaderInterface
     */
    public function getReader(): ReaderInterface {
        return $this->reader;
    }

    /**
     * set reader
     *
     * @param ReaderInterface $reader
     * @return void
     */
    public function setReader(ReaderInterface $reader): void {
        $this->reader = $reader;
    }

}