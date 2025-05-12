<?php

namespace App\Enums;

enum StatusEnum : string
{
    case BARU = 'baru';
    case PROSES = 'proses';
    case SELESAI = 'selesai';

    public static function options(): array
    {
        return [
            self::BARU->value => 'Baru',
            self::PROSES->value => 'Sudah Dibuka',
            self::SELESAI->value => 'Selesai',
        ];
    }

    public static function label($status): string
    {
        $options = self::options();

        return $options[$status] ?? 'Unknown';
    }
}
