<?php
namespace Metro\Cli;

use Metro\Cli\App as App;
use Exception as Exception;
use PHPUnit\Framework\TestCase;
use Metro\Cli\Filters\PriceFilter as PriceFilter;
use Metro\Cli\Readers\JsonReader as JsonReader;


class PriceFilterTest extends TestCase
{
    public function test_price_filter()
    {
        
        $PriceFilter = new PriceFilter;
    
        // Load test data
        $json = file_get_contents('demo.json');
    
        // Inject the reader
        $app = new App(new JsonReader());
    
        // get iterator
        $iterator = $app->reader->read($json)->getIterator();
        $before_count = iterator_count($iterator);
        // check if the offers count = 2 as in the demo.json
        $this->assertEquals($before_count, 2);
    
        // set filter parameters
        $PriceFilter->setStart(91.1);
        $PriceFilter->setEnd(100);
        
        // filter offers
        $PriceFilter->filterOffers($iterator);
        
        $after_count = $PriceFilter->count();
        // check if the offers count != 2
        $this->assertNotEquals($after_count, $before_count);
        // check if the offers count == 1
        $this->assertEquals($after_count, 1);
    }
}

