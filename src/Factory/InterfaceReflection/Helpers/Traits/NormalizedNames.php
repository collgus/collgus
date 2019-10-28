<?php 
namespace Collgus\Factory\InterfaceReflection\Helpers\Traits;

use Collgus\Helper\StringHelper;

trait NormalizedNames {
    public function getNormalizedProperty(string $methodName): string {
        $normalizedName = trim(strtolower($methodName));
        $cutoff = ["get", "set"];
        return StringHelper::instance()->cutoffSubStrings($cutoff, $normalizedName);
    }
}