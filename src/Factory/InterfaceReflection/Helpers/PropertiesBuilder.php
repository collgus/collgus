<?php 
namespace Collgus\Factory\InterfaceReflection\Helpers;

use Collgus\Helper\StringHelper;

class PropertiesBuilder {
    public function getNormalizedProperty(string $methodName): string {
        $normalizedName = trim(strtolower($methodName));
        $cutoff = ["get", "set"];
        return StringHelper::instance()->cutoffSubStrings($cutoff, $normalizedName);
    }
}