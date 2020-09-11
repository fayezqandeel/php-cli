<?php
namespace Metro\Cli;

require_once __DIR__ . '/vendor/autoload.php';

use Metro\Cli\App as App;
use Exception as Exception;
use Metro\Cli\Filters\DateFilter as DateFilter;
use Metro\Cli\Filters\PriceFilter as PriceFilter;
use Metro\Cli\Filters\VendorFilter as VendorFilter;
use Metro\Cli\Readers\JsonReader as JsonReader;
use Metro\Cli\Logger\Logger as Logger;




// preparing console paramters
$console_args = array_filter($argv, function($var){return !(strpos($var, '-') === 0);});
$console_args = array_merge($console_args, array());

// get console paramters
list($script, $function_name, $first_parameter, $second_parameter) = $console_args;

$range_functions = array('date_filter' ,'price_filter');

$all_functions = array_merge($range_functions, array('vendor_offers_count'));

$remote_url = 'demo.json';

$logger = Logger::getInstance();

try {
    
    // get console options
    $options = getopt("vp:hp:");
    
    // trigger help message
    if (isset($options['h'])) {
        throw new Exception('help needed!');
    }

    // check if function supported
    if (
        count($console_args) < 4
    ) {
        $logger->error('number of parameters is less than 3');
        throw new Exception('number of parameters is less than 3');
        return;
    }

    // check if function supported
    if (
        !in_array($function_name, $all_functions)
    ) {
        $logger->error('requested function is not permitted');
        throw new Exception('requested function is not permitted');
    }

    // check if function parameters exists for range filters
    if (
        in_array($function_name, array($range_functions)) &&
        !(
            $first_parameter || $second_parameter
        )
    ) {
        $logger->error('one or more range parameters are missing');
        throw new Exception('one or more range parameters are missing');
    }

    // check if function parameter exists for vendor filter
    if (
        $function_name == 'vendor_offers_count' && !$first_parameter
    ) {
        $logger->error('vendor id parameter is missing');
        throw new Exception('vendor id parameter is missing');
    }

    $supported_functions = array(
        'date_filter' => new DateFilter,
        'price_filter' => new PriceFilter,
        'vendor_offers_count' => new VendorFilter
    );

    // Load test data
    $json = file_get_contents($remote_url);

    // Inject the reader
    $app = new App(new JsonReader());

    // get iterator
    $iterator = $app->reader->read($json)->getIterator();

    // set filter parameters
    if (
        $function_name == 'date_filter'
    ) {
        $supported_functions[$function_name]->setStart($first_parameter);
        $supported_functions[$function_name]->setEnd($second_parameter);
    } else if ($function_name == 'price_filter') {
        $supported_functions[$function_name]->setStart(floatval($first_parameter));
        $supported_functions[$function_name]->setEnd(floatval($second_parameter));
    }
     else {
        $supported_functions[$function_name]->setId($first_parameter);
    }
    
    // filter offers
    $supported_functions[$function_name]->filterOffers($iterator);
    
} catch (Exception $e) {
    /**
     * Print how to use the script
     */
    echo <<<EOD
    \033[31m Invalid Usage, kindly try the following examples: 
    \033[34m
    $ php index.php date_filter 2019-03-01T10:00 2019-03-21T19:00 
    $ php index.php price_filter 10.00 100.00 
    $ php run.php vendor_offers_count <$vendor_id>
    EOD;
}