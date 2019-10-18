<?php 
namespace Test\Unit;

use Collgus\Helper\StringHelper;

class StringHelperTest extends \PHPUnit\Framework\TestCase {
    /** 
     * @var StringHelper
     */
    private $service = null;

    protected function setUp() {
        parent::setUp();
        $this->service =  new StringHelper();
    }

    public function testCutoffSubstring() {
        $alpha = "abcdefghijklmnoprstuw";
        $this->equalsCutoff("bcd", $alpha, "aefghijklmnoprstuw");
        $this->equalsCutoff("w", $alpha, "abcdefghijklmnoprstu");
        $this->equalsCutoff("a", $alpha, "bcdefghijklmnoprstuw");
        $this->equalsCutoff("u", $alpha, "abcdefghijklmnoprstw");
        $this->equalsCutoff("Uw ", $alpha, "abcdefghijklmnoprst");
        $this->equalsCutoff("i", $alpha, "abcdefghjklmnoprstuw");
        $this->equalsCutoff(["i", "fg"], $alpha, "abcdehjklmnoprstuw");
        $this->equalsCutoff(["a", "w"], $alpha, "bcdefghijklmnoprstu");
        $this->equalsCutoff(["z", "w"], $alpha, "abcdefghijklmnoprstu");
        $this->equalsCutoff(["abc", "stu"], $alpha, "defghijklmnoprw");
        $this->equalsCutoff(["abc", "stu", "k", "mn"], $alpha, "defghijloprw");
    }

    private function equalsCutoff($stringToCutoff, string $haystack, string $afterCutoff) {
        $this->assertEquals($afterCutoff, $this->service->cutoffSubStrings($stringToCutoff, $haystack));
    }
}