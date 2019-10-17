<?php 
namespace Collgus\Factory\InterfaceReflection\Helpers;

use ReflectionMethod;
use ReflectionParameter;
use Collgus\Helper\TypeReflection;

class ParametersBuilder {
    /** 
     * @param ReflectionMethod $refMethod
     * @return  Array<Content>
     */
    public function buildParameters(ReflectionMethod $refMethod): array {
        return array_map(function(ReflectionParameter $param) {
            return new ParamContent(
                TypeReflection::getStringTypeFromReflection($param->getType()), $param->getName()
            );
        }, $refMethod->getParameters());
    }
}