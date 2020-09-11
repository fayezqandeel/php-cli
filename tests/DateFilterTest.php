<?php
namespace Metro\Cli;

use Metro\Cli\App as App;
use Exception as Exception;
use PHPUnit\Framework\TestCase;
use Metro\Cli\Filters\DateFilter as DateFilter;
use Metro\Cli\Readers\JsonReader as JsonReader;


class DateFilterTest extends TestCase
{
    public function test_price_filter()
    {
        
        $DateFilter = new DateFilter;
    
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
        $DateFilter->setStart('2019-03-01T10:00');
        $DateFilter->setEnd('2019-03-31T10:00');
        
        // filter offers
        $DateFilter->filterOffers($iterator);
        
        $after_count = $DateFilter->count();
        // check if the offers count != 2
        $this->assertNotEquals($after_count, $before_count);
        // check if the offers count == 1
        $this->assertEquals($after_count, 1);
    }
}

