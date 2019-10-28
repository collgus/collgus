<?php
use Collgus\Factory;
use Collgus\Factory\InterfaceReflection\Helpers\MethodBuilder;
use Collgus\Factory\InterfaceReflection\Helpers\ParametersBuilder;
use Collgus\Factory\InterfaceReflection\Helpers\PropertiesBuilder;
use Collgus\GF\ClassGenerator;
use Collgus\GF\ClassGenerator\FileClassGenerator;
use Collgus\Factory\InterfaceReflection\InterfaceReflectionFactory;

if (!function_exists('interface_instance')) {
    /** 
     * Name of interface to instance
     * @param string $interface
     * Factory sttrategy algorythm
     * @param Factory $factory
     */
    function interface_instance(string $interface, Factory $factory = null, ClassGenerator $generator = null) {
        if (is_null($factory)) {
            $factory = new InterfaceReflectionFactory( new MethodBuilder(new ParametersBuilder(), new PropertiesBuilder()));
        }
        if (is_null($generator)) {
            $generator = new FileClassGenerator();
        }
        return $factory->factory($interface, $generator);
    }
}
