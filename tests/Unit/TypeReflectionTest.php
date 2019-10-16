<?php 
namespace Test\Unit;

use ReflectionType;
use ReflectionClass;
use Test\Domain\TestDomain;
use Collgus\Helper\TypeReflection;

class TypeReflectionTest  extends \PHPUnit\Framework\TestCase {
    /** 
     * @var ReflectionClass $reflectionCls
     */
    private $reflectionCls;

    protected function setUp(): void {
        parent::setUp();
        $this->reflectionCls = new ReflectionClass(new TestDomain());
    }
    private function equalsType(string $expect, ReflectionType $type): void {
        $this->assertEquals(strtolower(trim($expect)), TypeReflection::getStringTypeFromReflection($type));
    } 
    public function testStringType() {
        $this->equalsType("string", $this->reflectionCls->getMethod('stringMethod')->getReturnType());
    }
    public function testNullableType() {
        $this->equalsType("?string", $this->reflectionCls->getMethod('stringNullableMethod')->getReturnType());
    }
}