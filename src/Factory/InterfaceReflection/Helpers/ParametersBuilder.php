<?php 
namespace Collgus\Factory\InterfaceReflection\Helpers;

use Collgus\Factory\InterfaceReflection\Helpers\Traits\NormalizedNames;
use ReflectionMethod;
use ReflectionParameter;
use Collgus\Helper\TypeReflection;
use Collgus\GF\Content\ParamContent;

class ParametersBuilder {
    use NormalizedNames;
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