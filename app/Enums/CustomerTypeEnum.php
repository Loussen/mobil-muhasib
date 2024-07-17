<?php

namespace App\Enums;

enum CustomerTypeEnum: string
{
    case COMPANY = 'company';
    case INFLUENCER = 'influencer';

    public function readableText(): string
    {
        return match ($this) {
            self::COMPANY   => ucfirst(strtolower(self::COMPANY->name)),
            self::INFLUENCER   => ucfirst(strtolower(self::INFLUENCER->name)),
        };
    }

    public static function names(): array
    {
        return array_map(fn($case) => $case->name, self::cases());
    }

    public static function getDefaultName(): string
    {
        return self::COMPANY->name;
    }
}

