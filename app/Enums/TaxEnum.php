<?php

namespace App\Enums;

enum TaxEnum: string
{
    case SIMPLIFIED = 'Sadələşdirilmiş vergi';
    case VAT = 'ƏDV';
    case PROFIT = 'Mənfəət (Gəlir)';

    public static function getDefaultName(): string
    {
        return self::SIMPLIFIED->name;
    }

    public static function names(): array
    {
        return array_map(fn($case) => $case->name, self::cases());
    }

    public static function fromName(string $name)
    {
        return constant("self::$name");
    }
}

