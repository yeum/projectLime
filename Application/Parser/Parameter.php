<?php

namespace Application\Parser;

use Exception;

final class Parameter
{
    const INTEGER = 'integer';
    const FLOAT = 'float';
    const STRING = 'string';
    const ARRAY = 'array';
    const BOOLEAN = 'boolean';

    private static function getParam($source, $key, $type)
    {
        $value = null;
        if(isset($source[$key]) === false) {
            if($type != self::BOOLEAN) {
                throw new Exception("invalid param key : {$key}, expected type : {$type}");
            }
        } else {
            $value = $source[$key];
        }
        
        switch($type) {
            case self::INTEGER:
                if(is_int($value) === false) {
                    throw new Exception("invalid param key : {$key}, expected type : {$type}");
                }
                break;

            case self::FLOAT:
                if(is_int($value) === true) {
                    $value = floatval($value);
                }

                if(is_float($value) === false) {
                    throw new Exception("invalid param key : {$key}, expected type : {$type}");
                }
                break;
        
            case self::STRING:
                if(is_string($value) === false) {
                    throw new Exception("invalid param key : {$key}, expected type : {$type}");
                }
                break;
        
            case self::ARRAY:
                if(is_array($value) === false) {
                    throw new Exception("invalid param key : {$key}, expected type : {$type}");
                }
                break;

            case self::BOOLEAN:
                if(is_bool($value) === false) {
                    throw new Exception("invalid param key : {$key}, expected type : {$type}");
                }
                break;

            default:
                throw new Exception("not specify type key : {$key}, expected type : {$type}");
        }
        return $value;
    }

    public static function getIntegerParam($source, $key): int
    {
        return self::getParam($source, $key, self::INTEGER);
    }

    public static function getFloatParam($source, $key): float
    {
        return self::getParam($source, $key, self::FLOAT);
    }

    public static function getStringParam($source, $key): string
    {
        return self::getParam($source, $key, self::STRING);
    }

    public static function getArrayParam($source, $key): array
    {
        return self::getParam($source, $key, self::ARRAY);
    }

    public static function getBooleanParam($source, $key): bool
    {
        return self::getParam($source, $key, self::BOOLEAN);
    }
}