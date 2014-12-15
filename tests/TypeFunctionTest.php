<?php

namespace TypedPHP\Functions\TypeFunctions\Test;

use TypedPHP\Functions\TypeFunctions;

class TypeFunctionTest extends Test
{
    /**
     * @test
     */
    public function itIdentifiesNumbers()
    {
        $this->assertTrue(TypeFunctions\isNumber(0));
        $this->assertTrue(TypeFunctions\isNumber(0.5));
        $this->assertTrue(TypeFunctions\isNumber(1));

        $this->assertFalse(TypeFunctions\isNumber("1"));
        $this->assertFalse(TypeFunctions\isNumber(true));
        $this->assertFalse(TypeFunctions\isNumber(false));
    }

    /**
     * @test
     */
    public function itIdentifiesBooleans()
    {
        $this->assertTrue(TypeFunctions\isBoolean(true));
        $this->assertTrue(TypeFunctions\isBoolean(false));

        $this->assertFalse(TypeFunctions\isBoolean("true"));
        $this->assertFalse(TypeFunctions\isBoolean("false"));
        $this->assertFalse(TypeFunctions\isBoolean(1));
        $this->assertFalse(TypeFunctions\isBoolean(0));
    }

    /**
     * @test
     */
    public function itIdentifiesNulls()
    {
        $this->assertTrue(TypeFunctions\isNull(null));

        $this->assertFalse(TypeFunctions\isNull("null"));
        $this->assertFalse(TypeFunctions\isNull(false));
        $this->assertFalse(TypeFunctions\isNull(0));
    }

    /**
     * @test
     */
    public function itIdentifiesObjects()
    {
        $this->assertTrue(TypeFunctions\isObject($this));

        $function = function () {
            echo "hello";
        };

        $this->assertFalse(TypeFunctions\isObject($function));
    }

    /**
     * @test
     */
    public function itIdentifiesFunctions()
    {
        $function = function () {
            echo "hello";
        };

        $this->assertTrue(TypeFunctions\isFunction($function));

        $this->assertFalse(TypeFunctions\isFunction($this));
        $this->assertFalse(TypeFunctions\isFunction("is_callable"));
    }

    /**
     * @test
     */
    public function itIdentifiesExpressions()
    {
        $this->assertTrue(TypeFunctions\isExpression("[a-z]"));

        $this->assertFalse(TypeFunctions\isExpression("hello"));
    }

    /**
     * @test
     */
    public function itIdentifiesStrings()
    {
        $this->assertTrue(TypeFunctions\isString("hello"));

        $this->assertFalse(TypeFunctions\isString("[a-z]"));
    }

    /**
     * @test
     */
    public function itIdentifiesResources()
    {
        $file = fopen(__FILE__, "r");

        $this->assertTrue(TypeFunctions\isResource($file));

        $this->assertFalse(TypeFunctions\isResource("hello"));

        fclose($file);
    }

    /**
     * @test
     */
    public function itIdentifiesArrays()
    {
        $this->assertTrue(TypeFunctions\isArray(["foo", "bar"]));

        $this->assertFalse(TypeFunctions\isArray("foo"));
    }

    /**
     * @test
     */
    public function itIdentifiesTypes()
    {
        $file = fopen(__FILE__, "r");

        $function = function () {
            echo "hello";
        };

        $types = [
            "number" => 1.5,
            "boolean" => true,
            "null" => null,
            "object" => $this,
            "function" => $function,
            "expression" => "[a-z]",
            "string" => "hello",
            "resource" => $file,
            "array" => ["foo", "bar"]
        ];

        foreach ($types as $type => $variable) {
            $this->assertEquals($type, TypeFunctions\getType($variable));
        }

        fclose($file);
    }
}
