<?php 
namespace Collgus\Factory\InterfaceReflection\Helpers;

use Collgus\Factory\InterfaceReflection\Helpers\Traits\NormalizedNames;
use ReflectionMethod;

class PropertiesBuilder {
    use NormalizedNames;
    /** 
     * @var Array<Content>
     */
    private $properties = [];


    public function buildParameters(ReflectionMethod $relatedMethod): void {

    }
}