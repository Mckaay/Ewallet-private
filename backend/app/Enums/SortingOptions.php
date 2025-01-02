<?php

declare(strict_types=1);

namespace App\Enums;

enum SortingOptions: string
{
    case LATEST = 'latest';
    case OLDEST = 'oldest';
    case AtoZ = 'atoz';
    case ZtoA = 'ztoa';
    case HIGHEST = 'highest';
    case LOWEST = 'lowest';

    public static function toArray(): array
    {
        $array = [];

        foreach (self::cases() as $case) {
            $array[mb_strtolower($case->name)] = $case->value;
        }

        return $array;
    }

    public function orderBy(): array
    {
        return match ($this) {
            self::LATEST => ['date', 'desc'],
            self::OLDEST => ['date', 'asc'],
            self::AtoZ => ['name', 'asc'],
            self::ZtoA => ['name', 'desc'],
            self::HIGHEST => ['amount', 'desc'],
            self::LOWEST => ['amount', 'asc'],
        };
    }
}
