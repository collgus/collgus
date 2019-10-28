<?php 
namespace Collgus\Factory\InterfaceReflection\Helpers;

use ReflectionClass;
use ReflectionMethod;
use Collgus\GF\Content;
use Collgus\GF\Content\GetterContent;
use Collgus\GF\Content\MethodContent;
use Collgus\GF\Content\SetterContent;
use Collgus\GF\Content\PropertyContent;
use Collgus\Exception\InvalidArgsException;
use Collgus\GF\Content\MethodWithPropertiesContent;
use Collgus\Factory\InterfaceReflection\Helpers\ParametersBuilder;
use Collgus\Factory\InterfaceReflection\Helpers\PropertiesBuilder;

class MethodBuilder {
    /** 
     * @var PropertiesBuilder
     */
    protected $propsBuilder;
    /** 
     * @var ParametersBuilder
     */
    protected $paramsBuilder;

    public function __construct(ParametersBuilder $paramsBuilder, PropertiesBuilder $propsBuilder) {
        $this->paramsBuilder = $paramsBuilder;
        $this->propsBuilder = $propsBuilder;
    }
    /** 
     * @param ReflectionClass $reflectionInterface
     * @return Array<Content>
     */
    public function buildMethods(ReflectionClass $reflectionInterface): array {
        $resultArr = [];
        try {
            foreach ($reflectionInterface->getMethods() as $reflectMethod) {
                array_push($resultArr, $this->buildMethod($reflectMethod));
            }
            return $resultArr;
        }
        catch(InvalidArgsException $exception) {
            throw $exception;
        }

    }
    public function buildMethod(ReflectionMethod $reflectionMethod): Content {
        $body = "";
        $propertyName  = $this->propsBuilder->getNormalizedProperty($reflectionMethod->getName());
        $properties = null;
        if (is_integer(strpos($reflectionMethod->getName(), "set"))) {
            $body = new SetterContent($propertyName, "val");
        } else {
            $body = new GetterContent($propertyName);
            $properties = [ new PropertyContent($propertyName)];
        }
        $content = new MethodContent($reflectionMethod->getName(), $this->paramsBuilder->buildParameters($reflectionMethod), $body, $reflectionMethod->getReturnType()->__toString());
        return  $content;
    }

    public function buildProperties(ReflectionMethod $relativeMethod): ?array {
        
    }
}