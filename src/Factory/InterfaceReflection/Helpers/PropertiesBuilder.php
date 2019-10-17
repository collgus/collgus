<?php 
namespace Collgus\Factory\InterfaceReflection\Helpers;


class PropertiesBuilder {
    public function getNormalizedProperty(string $methodName): string {
        // cut off "get" and "Set" keywords and return offset string 
        return "";
    }
}