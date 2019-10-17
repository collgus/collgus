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
    public function buildMethods(ReflectionClass $relfectionInterface): array {
        $resultArr = [];
        try {
            foreach ($relfectionInterface->getMethods() as $reflectMethod) {
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

        if (strpos($reflectMethod->getName(), "get")) {
            $body = new GetterContent()
        } else if (strpos($reflectMethod->getName(), "set")) {
            $body = new SetterContent();
        }
        $content = new MethodWithPropertiesContent($reflectMethod->getName(), $this->buildParameters($reflectMethod), );
    }
}