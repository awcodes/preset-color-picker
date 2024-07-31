<?php

use Awcodes\PresetColorPicker\Utils;
use Filament\Support\Colors\Color;

it('can process colors', function () {
    $colors = [
        'primary' => Color::Amber,
    ];

    $processedColors = Utils::processColors($colors);

    expect($processedColors)
        ->toHaveKey('primary')
        ->toContain([
            'label' => 'Primary',
            'type' => 'rgb',
            'value' => 'rgba(245, 158, 11, 1)',
        ]);
});
