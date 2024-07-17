<?php

namespace App\Helpers;

class EnumHelper
{
    public static function getEnumValuesAsArray($enumClass): array
    {
        $result = [];
        foreach ($enumClass::cases() as $case) {
            $result[$case->name] = $case->readableText();
        }
        return $result;
    }

    public static function getDefaultValue($enumClass)
    {
        if (method_exists($enumClass, 'getDefaultName')) {
            return $enumClass::getDefaultName();
        }
    }
}
