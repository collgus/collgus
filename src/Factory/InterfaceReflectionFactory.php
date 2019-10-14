<?php 
namespace Collgus\Factory;

use ReflectionClass;
use Collgus\GF\Factory;
use Collgus\GF\ClassGenerator;
use Collgus\GF\Content;
use Collgus\GF\Content\ClassContent;
use Collgus\GF\Content\FileClassContent;
use Collgus\GF\Exception\InvalidArgsException;

class InterfaceReflectionFactory implements Factory {

    /** 
     * @var ReflectionClass $reflection
     */
    protected $reflection;
    /** 
     * @var ClassGenerator
     */
    protected $generator;
    /** 
     * @throws InvalidArgsException
     */
    public function factory(string $interface, ClassGenerator $generator) {
        if (!interface_exists($interface)) {
            throw new InvalidArgsException("Interface $interface dosen't exist");
        }
        
        $this->reflection = new ReflectionClass($interface);
        $this->generator = $generator;
        
        // $this->generator->generate($this->buildContent());
    }
    /*private function buidClassContent(ReflectionClass $reflectionClass): Content {
        return null;
        return new ClassContent($reflectionClass->getName(), $reflectionClass->getInterfaces(), );
    } */
}