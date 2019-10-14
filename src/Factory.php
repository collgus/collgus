<?php 
namespace Collgus;

use Collgus\GF\ClassGenerator;
use Collgus\Exception\InvalidArgsException;




interface Factory {
    /** 
     * @throws InvalidArgsException
     * 
     * Should return instance of Interface name object
     */
    public function factory(string $interfaceName, ClassGenerator $generator);
}