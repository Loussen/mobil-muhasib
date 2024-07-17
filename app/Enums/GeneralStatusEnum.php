<?php

namespace App\Enums;

enum GeneralStatusEnum: string
{
    case ACTIVE = 'Active';
    case PASSIVE = 'Passive';
    case DRAFT = 'Draft';

    public function readableText(): string
    {
        return match ($this) {
            self::ACTIVE => trans('backpack::custom.general_statuses.active'),
            self::PASSIVE => trans('backpack::custom.general_statuses.passive'),
            self::DRAFT   => trans('backpack::custom.general_statuses.draft'),
        };
    }

    public static function getDefaultName(): string
    {
        return self::ACTIVE->name;
    }
}

