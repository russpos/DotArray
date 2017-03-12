<?php

namespace DotArray;

/**
 * Extract 
 * 
 * Simple class to extract values from a key using dot-notation.
 *
 * ```
 * $value = DotArray\Extract::keyFromArray('a.b.c', ['a' => ['b'=>['c' => 'hello world']]]);
 * echo $value; // 'hello world';
 *  ```
 */
class Extract {

    public static function keyFromArray(string $key, array $data_array) {
        $keys = explode(".", $key);

        $current_stack = $data_array;
        foreach ($keys as $current_key) {
            if (!is_array($current_stack)) {
                return null;
            }
            $value = self::singleKeyFromArray($current_key, $current_stack);
            $current_stack = $value;
        }
        return $current_stack;
    }

    private static function singleKeyFromArray(string $key, array $data_array) {
        if (!isset($data_array[$key])) {
            return null;
        }
        return $data_array[$key];
    }

}
