<?php

namespace Obelaw\Contacts;

use InvalidArgumentException;

/**
 * ContactType class to manage contact types.
 * This class allows you to define and manage different types of contacts.
 */
class ContactType
{
    private static array $types = [];

    private function __construct()
    {
        // Prevent instantiation
    }

    public static function add(string $type, int $value, string $group = null): void
    {
        if (self::isValid($value)) {
            throw new InvalidArgumentException("Type '$type' already exists.");
        }

        if (!is_int($value)) {
            throw new InvalidArgumentException("Value must be an integer.");
        }

        if ($group)
            self::$types[$group][$type] = $value;

        if (!$group)
            self::$types[$type] = $value;
    }

    public static function get(string $type, string $group = null): ?int
    {
        if ($group)
            return self::$types[$group][$type] ?? null;

        return self::$types[$type] ?? null;
    }

    public static function isValid(int $value): bool
    {
        return in_array($value, array_values(self::getAllValuesFlat(self::getTypes())), true);
    }

    public static function getTypes(): array
    {
        return self::$types;
    }

    private static function getAllValuesFlat(array $array): array
    {
        $flatValues = [];
        array_walk_recursive($array, function ($value) use (&$flatValues) {
            $flatValues[] = $value;
        });
        return $flatValues;
    }
}
