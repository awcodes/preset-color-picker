<?php

namespace Awcodes\PresetColorPicker\Tests\Fixtures;

use Awcodes\PresetColorPicker\PresetColorPicker;
use Filament\Forms\Form;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;

class TestComponent extends TestForm
{
    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                PresetColorPicker::make('color')
                    ->colors([
                        ...FilamentColor::getColors(),
                        'badass' => Color::hex('#bada55'),
                    ])
                    ->size('sm')
                    ->withBlack()
                    ->withWhite()
            ]);
    }
}
