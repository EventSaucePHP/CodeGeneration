<?php

declare(strict_types=1);

namespace EventSauce\EventSourcing\CodeGeneration;

use ReflectionClass;
use ReflectionException;

use function ltrim;

/**
 * @internal
 */
class TypeNormalizer
{
    public static function normalize(string $type): string
    {
        $type = ltrim($type, '\\');

        return static::isNativeType($type)
            ? $type
            : '\\' . $type;
    }

    public static function isNativeType(string $type): bool
    {
        try {
            /* @phpstan-ignore-next-line */
            new ReflectionClass($type);

            return false;
        } catch (ReflectionException $isNativeType) {
            return true;
        }
    }
}
