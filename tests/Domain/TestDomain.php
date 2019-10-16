<?php 
namespace Test\Domain;

class TestDomain {
    public function boolMethod(): ?bool {
        return false;
    }
    public function stringMethod(): string {
        return "false";
    }
    public function stringNullableMethod(): ?string {
        return null;
    }
} 