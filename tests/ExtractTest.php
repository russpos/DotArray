<?php

use PHPUnit\Framework\TestCase;

class ExtractTest extends TestCase {

    public function setUp() {
        $this->array = [
            'hello' => 'world',

            'database' => [
                'connection' => [
                    'type' => 'mysql',
                    'host' => 'localhost',
                    'port' => 3306,
                    'user' => 'root',
                    'password' => 'r00t',
                ]
            ]
        ];
    }

    public function testClassExists() {
        $this->assertTrue(class_exists("DotArray\Extract"));
    }

    public function testKeyFromArrayExists() {
        $this->assertTrue(method_exists("DotArray\Extract", "keyFromArray"));
    }

    public function testKeyFromArrayReturnsBasicKeys() {
        $this->assertEquals(DotArray\Extract::keyFromArray("hello", $this->array), "world");
    }

    public function testKeyFromArrayHandlesMissingKeys() {
        $this->assertEquals(DotArray\Extract::keyFromArray("ello", $this->array), null);
    }

    public function testKeyFromArrayReturnsNestedKey() {
        $this->assertEquals(DotArray\Extract::keyFromArray("database.connection.type", $this->array), "mysql");
    }

    public function testKeyFromArraySafelyHandlesMiddleKeysMissing() {
        $this->assertEquals(DotArray\Extract::keyFromArray("database.conn.type", $this->array), null);
    }

    public function testKeyFromArraySafelyHandlesArrayTypes() {
        $this->assertEquals(DotArray\Extract::keyFromArray("database.connection", $this->array),
            $this->array['database']['connection']
        );
    }
}
