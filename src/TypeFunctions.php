<?php

namespace TypedPHP\Functions\TypeFunctions;

/**
 * @param mixed $variable
 *
 * @return bool
 */
function isNumber($variable)
{
    return is_integer($variable) or is_float($variable);
}

/**
 * @param mixed $variable
 *
 * @return bool
 */
function isBoolean($variable)
{
    return is_bool($variable);
}

/**
 * @param mixed $variable
 *
 * @return bool
 */
function isNull($variable)
{
    return is_null($variable);
}

/**
 * @param mixed $variable
 *
 * @return bool
 */
function isObject($variable)
{
    return is_object($variable) and !isFunction($variable);
}

/**
 * @param mixed $variable
 *
 * @return bool
 */
function isFunction($variable)
{
    return is_callable($variable) and is_object($variable);
}

/**
 * @param mixed $variable
 *
 * @return bool
 */
function isExpression($variable)
{
    $isNotFalse = @preg_match($variable, "") !== false;
    $hasNoError = preg_last_error() === PREG_NO_ERROR;

    return $isNotFalse and $hasNoError;
}

/**
 * @param mixed $variable
 *
 * @return bool
 */
function isString($variable)
{
    return is_string($variable) and !isExpression($variable);
}

/**
 * @param mixed $variable
 *
 * @return bool
 */
function isResource($variable)
{
    return is_resource($variable);
}

/**
 * @param mixed $variable
 *
 * @return bool
 */
function isArray($variable)
{
    return is_array($variable);
}

/**
 * @param mixed $variable
 *
 * @return string
 */
function getType($variable)
{
    $functions = [
        "isNumber" => "number",
        "isBoolean" => "boolean",
        "isNull" => "null",
        "isObject" => "object",
        "isFunction" => "function",
        "isExpression" => "expression",
        "isString" => "string",
        "isResource" => "resource",
        "isArray" => "array"
    ];

    $result = "unknown";

    foreach ($functions as $function => $type) {
        $namespace = "TypedPHP\\Functions\\TypeFunctions\\";
        $function = $namespace . $function;

        if ($function($variable)) {
            $result = $type;
            break;
        }
    }

    return $result;
}
