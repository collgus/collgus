<?php 
namespace Collgus\Factory\InterfaceReflection\Helpers;

use ReflectionClass;
use ReflectionMethod;
use Collgus\GF\Content;
use Collgus\GF\Content\GetterContent;
use Collgus\GF\Content\SetterContent;
use Collgus\Exception\InvalidArgsException;
use Collgus\GF\Content\MethodWithPropertiesContent;

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
        if (strpos($reflectMethod->getName(), "get")) {
            $body = new GetterContent($propertyName);
        } else if (strpos($reflectMethod->getName(), "set")) {
            $body = new SetterContent($propertyName, "val");
        }
        $content = new MethodWithPropertiesContent($reflectMethod->getName(), $this->buildParameters($reflectMethod), );
        return  null;
    }
}