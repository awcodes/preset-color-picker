<?php

use Awcodes\PresetColorPicker\PresetColorPicker;
use Awcodes\PresetColorPicker\Tests\Fixtures\TestComponent;
use Awcodes\PresetColorPicker\Tests\Fixtures\TestForm;
use Filament\Forms\ComponentContainer;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use function Pest\Livewire\livewire;

it('has default colors', function() {
    $field = (new PresetColorPicker('color'))
        ->container(ComponentContainer::make(TestForm::make()));

    expect($field)
        ->getColors()->toHaveKeys(array_keys(FilamentColor::getColors()));
});

it('supports custom colors', function() {
    $field = (new PresetColorPicker('color'))
        ->container(ComponentContainer::make(TestForm::make()))
        ->colors([
            ...FilamentColor::getColors(),
            'badass' => Color::hex('#bada55'),
        ]);

    expect($field)
        ->getColors()->toHaveKey('badass');
});

it('sets the right size', function() {
    $field = (new PresetColorPicker('color'))
        ->container(ComponentContainer::make(TestForm::make()))
        ->size('sm');

    expect($field)
        ->getSize()->toBe('sm');
});

it('adds white and black', function() {
    $field = (new PresetColorPicker('color'))
        ->container(ComponentContainer::make(TestForm::make()))
        ->withBlack()
        ->withWhite();

    expect($field)
        ->getColors()->toHaveKeys(['white', 'black']);
});

it('swaps white and black', function() {
    $field = (new PresetColorPicker('color'))
        ->container(ComponentContainer::make(TestForm::make()))
        ->withBlack(swap: '#ef4444')
        ->withWhite(swap: '#22c55e');

    expect($field)
        ->getColors()->toContain(['label' => 'Black', 'type' => 'rgb', 'value' => 'rgba(239, 68, 68, 1)'])
        ->getColors()->toContain(['label' => 'White', 'type' => 'rgb', 'value' => 'rgba(34, 197, 94, 1)']);
});

it('can render the form component', function () {
    livewire(TestComponent::class)
        ->assertFormFieldExists('color')
        ->assertSee('pcp-preset-color-picker')
        ->assertSee('rgba(186, 218, 85, 1)');
});

it('can save correct data', function () {
   livewire(TestComponent::class)
        ->fillForm([
            'color' => 'badass'
        ])
        ->assertFormSet([
            'color' => 'badass',
        ])
        ->call('save')
        ->assertHasNoFormErrors()
        ->assertSet('data.color', 'badass');
});

it('can update correct data', function () {
    livewire(TestComponent::class)
        ->fillForm([
            'color' => 'badass'
        ])
        ->assertFormSet([
            'color' => 'badass',
        ])
        ->fillForm([
            'color' => 'primary'
        ])
        ->call('save')
        ->assertHasNoFormErrors()
        ->assertSet('data.color', 'primary');
});
