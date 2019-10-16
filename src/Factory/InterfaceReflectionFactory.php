<?php 
namespace Collgus\Factory;

use Collgus\Factory;
use ReflectionClass;
use Collgus\GF\Content;
use Collgus\GF\ClassGenerator;
use Collgus\GF\Content\ClassContent;
use Collgus\GF\Content\FileClassContent;
use Collgus\GF\Content\MethodWithPropertiesContent;
use Collgus\GF\Content\ParamContent;
use Collgus\GF\Exception\InvalidArgsException;
use ReflectionMethod;
use ReflectionParameter;

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
        
        $this->generator->generate($this->buildContent($interface, $this->reflection));
    }
    private function buidClassContent(string $interface, ReflectionClass $reflectionClass): Content {
        $mapInterfaces = array_map( function(ReflectionClass $interfaceReflection) {

        }, $reflectionClass->getInterfaces());
        return new ClassContent($reflectionClass->getName(), array_merge($mapInterfaces, [$interface]), $this->buildMethods($reflectionClass));
    }
    /** 
     * @param ReflectionClass $reflectionInterface
     * @return Array<Content>
     */
    private function buildMethods(ReflectionClass $relfectionInterface): array {
        $resultArr = [];
        foreach ($relfectionInterface->getMethods() as $reflectMethod) {
            $content = new MethodWithPropertiesContent($reflectMethod->getName(), $reflectMethod->getPa);
        }
        return $resultArr;
    } 
    /** 
     * @param ReflectionMethod $refMethod
     * @return  Array<Content>
     */
    private function buildParameters(ReflectionMethod $refMethod): array {
        return array_map(function(ReflectionParameter $param) {
            return new ParamContent($param->getType(), $param->getName());
        }, $refMethod->getParameters());
    }
}