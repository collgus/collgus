<?php 
namespace Collgus\Factory\InterfaceReflection;

use Collgus\Factory;
use ReflectionClass;
use ReflectionMethod;
use Collgus\GF\Content;
use ReflectionParameter;
use Collgus\GF\ClassGenerator;
use Collgus\Helper\TypeReflection;
use Collgus\GF\Content\ClassContent;
use Collgus\GF\Content\ParamContent;
use Collgus\GF\Content\GetterContent;
use Collgus\GF\Content\SetterContent;
use Collgus\GF\Content\FileClassContent;
use Collgus\Exception\InvalidArgsException;
use Collgus\GF\Content\MethodWithPropertiesContent;
use Collgus\Factory\InterfaceReflection\Helpers\MethodBuilder;
use Collgus\Factory\InterfaceReflection\Helpers\ParametersBuilder;
use Collgus\Factory\InterfaceReflection\Helpers\PropertiesBuilder;

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
     * @var MethodBuilder
     */
    protected $methodBuilder;


    public function __construct(MethodBuilder $methodBuilder) {
        $this->methodBuilder = $methodBuilder;
    }
    /** 
     * @throws InvalidArgsException
     */
    public function factory(string $interface, ClassGenerator $generator) {
        if (!interface_exists($interface)) {
            throw new InvalidArgsException("Interface $interface dosen't exist");
        }
        
        $this->reflection = new ReflectionClass($interface);
        $this->generator = $generator;
        
        $this->generator->generate($this->buidClassContent($interface, $this->reflection));
    }
    private function buidClassContent(string $interface, ReflectionClass $reflectionClass): Content {
        $mapInterfaces = array_map( function(ReflectionClass $interfaceReflection) {

        }, $reflectionClass->getInterfaces());
        return new ClassContent($reflectionClass->getName(), array_merge($mapInterfaces, [$interface]), $this->methodBuilder->buildMethods($reflectionClass));
    }
     


}