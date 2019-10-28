<?php 
namespace Test\Unit;

use Test\Domain\TestInterface;


class OutputTest  extends \PHPUnit\Framework\TestCase {
    public function testInstanceInterface() {
        $testInterface = \interface_instance(TestInterface::class);

    }
}