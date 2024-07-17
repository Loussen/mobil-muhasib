<?php

namespace App\Enums;

enum GenderEnum: string
{
    case MALE = 'MALE';
    case FEMALE = 'FEMALE';
    case PREFER_NOT_TO_SAY = 'PREFER_NOT_TO_SAY';
    case OTHER = 'OTHER';

    public function readableText(): string
    {
        return match ($this) {
            self::MALE   => ucfirst(strtolower(self::MALE->name)),
            self::FEMALE   => ucfirst(strtolower(self::FEMALE->name)),
            self::PREFER_NOT_TO_SAY   => ucfirst(strtolower(str_replace('_',' ',self::PREFER_NOT_TO_SAY->name))),
            self::OTHER   => ucfirst(strtolower(self::OTHER->name)),
        };
    }

    public static function names(): array
    {
        return array_map(fn($case) => $case->name, self::cases());
    }

    public static function getDefaultName(): string
    {
        return self::MALE->name;
    }
}

