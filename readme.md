# Type Functions

[![Build Status](http://img.shields.io/travis/typedphp/type-functions.svg?style=flat-square)](https://travis-ci.org/typedphp/type-functions)
[![Code Quality](http://img.shields.io/scrutinizer/g/typedphp/type-functions.svg?style=flat-square)](https://scrutinizer-ci.com/g/typedphp/type-functions)
[![Code Coverage](http://img.shields.io/scrutinizer/coverage/g/typedphp/type-functions.svg?style=flat-square)](http://typedphp.github.io/type-functions/master)
[![Version](http://img.shields.io/packagist/v/typedphp/type-functions.svg?style=flat-square)](https://packagist.org/packages/typedphp/type-functions)
[![License](http://img.shields.io/packagist/l/typedphp/type-functions.svg?style=flat-square)](licence.md)

## Example

```php
use TypedPHP\Functions\TypeFunctions;

TypeFunctions\getType(1.5); // number

TypeFunctions\isBoolean(false);   // true
TypeFunctions\isBoolean("false"); // false
```

Functions:

- `isNumber(mixed $variable) → bool`
- `isBoolean(mixed $variable) → bool`
- `isNull(mixed $variable) → bool`
- `isObject(mixed $variable) → bool`
- `isFunction(mixed $variable) → bool`
- `isExpression(mixed $variable) → bool`
- `isString(mixed $variable) → bool`
- `isResource(mixed $variable) → bool`
- `getType(mixed $variable) → string`

Caveats:

- `isExpression` will return false if `isString` returns true.
- `isFunction` will return false if `isObject` returns true.
- `getType` will return unknown if the argument is not matched by any of the `is*` functions.

## Installation

```sh
❯ composer require "typedphp/type-functions:*"
```

## Testing

```sh
❯ composer create-project "typedphp/type-functions:*" .
❯ vendor/bin/phpunit
```
