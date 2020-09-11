<?php 

namespace Metro\Cli\Logger;

// General singleton class.
class Logger {

    // Hold the class instance.
    private static $instance = null;

    // check if logger enabled
    private $is_enabled = false;

    // The constructor is private
    // to prevent initiation with outer code.
    private function __construct()
    {
    }
 
    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Logger();
        }

        // get console options
        $options = getopt("vh");

        // trigger verbose
        if (isset($options['v'])) {
            self::$instance->is_enabled = true;
        }
    
        return self::$instance;
    }

    public function info(string $message): void {
        if ($this->is_enabled) {
            echo "\033[34m - " . $message . "\033[0m\n";
        }
    }

    public function error(string $message): void {
        if ($this->is_enabled) {
            echo "\033[31m - " . $message . "\033[0m\n";
        }
    }

    public function success(string $message): void {
        if ($this->is_enabled) {
            echo "\033[32m - " . $message . "\033[0m\n";
        }
    }

    public function warn(string $message): void {
        if ($this->is_enabled) {
            echo "\033[93m - " . $message . "\033[0m\n";
        }
    }

}