<?php 
namespace Collgus\Factory\InterfaceReflection;

use Collgus\Factory\InterfaceReflection\Helpers\MethodBuilder;
use Collgus\Factory\InterfaceReflection\Helpers\ParametersBuilder;
use Collgus\Factory\InterfaceReflection\Helpers\PropertiesBuilder;
use Collgus\Factory\InterfaceReflection\InterfaceReflectionFactory;

class Facade {
    /** 
     * @var MethodBuilder
     */
    private static $methodBuilder;
    /** 
     * @var ParametersBuilder
     */
    private static $paramsBuilder;
    /** 
     * @var PropertiesBuilder
     */
    private static $propsBuilder;

    public static function getFactory(): InterfaceReflectionFactory {
        $factory = new InterfaceReflectionFactory(self::methodBuilder());
        return $factory;
    }

    private static function methodBuilder(): MethodBuilder {
        if (!self::$methodBuilder) {
            self::$methodBuilder = new MethodBuilder(self::paramsBuilder(), self::propsBuilder());
        }
        return self::$methodBuilder;
    }
    private static function paramsBuilder(): ParametersBuilder {
        if (!self::$paramsBuilder) {
            self::$paramsBuilder = new ParametersBuilder();
        }
        return self::$paramsBuilder;
    }
    private static function propsBuilder(): PropertiesBuilder {
        if (!self::$propsBuilder) {
            self::$propsBuilder = new PropertiesBuilder();
        }
        return self::$propsBuilder;
    }
}