<?php 
namespace Collgus\Helper;


class StringHelper {
    /** 
     * @var self
     */
    private static $instance = null;

    public static function instance(): StringHelper {
        if (is_null(self::$instance)) {
            self::$instance = new StringHelper();
        }
        return self::$instance;
    }
    /** 
     * @param Array<string>|string $cutoff
     * @param string $string
     * 
     * @return string
     */
    public function cutoffSubStrings($cutoff, string $string): string {
        $result = $string;
        if (is_array($cutoff)) {
            foreach ($cutoff as $cutoffString) {
                $result = $this->cutoffSubString($cutoffString, $result);
            }
        } else if (is_string($cutoff)) {
            $result = $this->cutoffSubString($cutoff, $string);
        }

        return $result;
    }
    /** 
     * @param string $substring
     * @param string $string
     * 
     * @return string
     */
    private function cutoffSubString(string $substring, string $string): string {
        $string  = trim(strtolower($string));
        $substring = trim(strtolower($substring));

        $indexFst = strpos($string, $substring);
        if ($indexFst === false) {
            return $string;
        }

        if (\is_int($indexFst)) {
            $indexLst = \strlen($substring);
            return substr($string, 0, $indexFst) . substr($string, $indexFst + $indexLst, \strlen($string));
        }
        return $string; 
    }
}