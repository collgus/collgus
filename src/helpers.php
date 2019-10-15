<?php

use Collgus\Factory;
use Collgus\Factory\InterfaceReflectionFactory;
use Collgus\GF\ClassGenerator;
use Collgus\GF\ClassGenerator\FileClassGenerator;

if (!function_exists('interface_instance')) {
    /** 
     * Name of interface to instance
     * @param string $interface
     * Factory sttrategy algorythm
     * @param Factory $factory
     */
    function interface_instance(string $interface, Factory $factory = null, ClassGenerator $generator = null) {
        if (is_null($factory)) {
            $factory = new InterfaceReflectionFactory();
        }
        if (is_null($generator)) {
            $generator = new FileClassGenerator();
        }
        return $factory->factory($interface, $generator);
    }
}
