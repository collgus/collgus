<?php

use Collgus\Factory;
use Collgus\Factory\InterfaceReflectionFactory;

if (!function_exists('interface_instance')) {
    function interface_instance(string $interface, Factory $factory = null) {
        if (is_null($factory)) {
            $factory = new InterfaceReflectionFactory();
        }
        return "";
    }
}
