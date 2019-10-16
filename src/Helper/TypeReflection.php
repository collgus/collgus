<?php 
namespace Collgus\Helper;

use ReflectionType;

class TypeReflection {
    public static function getStringTypeFromReflection(?ReflectionType $refType): ?string {
        if (is_null($refType)) {
            return null;
        }

        return strval(
            ($refType->allowsNull() ? '?' : '') . strval($refType)
        );
    }
}