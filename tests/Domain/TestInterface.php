<?php 
namespace Test\Domain;


interface TestInterface {
    public function setVal(string $val): void;
    public function getVal(): string;
}