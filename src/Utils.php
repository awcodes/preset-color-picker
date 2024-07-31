<?php

namespace Awcodes\PresetColorPicker;

use Illuminate\Support\Collection;

class Utils
{
    public static function processColors(array $colors): array | Collection
    {
        return collect($colors)->mapWithKeys(function ($color, $key) {
            return [$key => static::buildColor($color, $key)];
        });
    }

    public static function buildColor(array | string $color, string $key): array
    {
        $value = is_array($color) ? $color[500] : $color;

        if (preg_match('/(^#?[a-f0-9]{6})/', $value) === 1) {
            $type = 'hex';
        } elseif (preg_match("/([a-f0-9]{3}$)|(\d{1,3},\s\d{1,3},\s\d{1,3})/", $value) === 1) {
            $type = 'rgb';
        } else {
            $type = 'class';
        }

        return [
            'label' => (string) str($key)->title()->replace('-', ' '),
            'type' => $type,
            'value' => $type === 'rgb' ? "rgba($value, 1)" : $value,
        ];
    }
}
