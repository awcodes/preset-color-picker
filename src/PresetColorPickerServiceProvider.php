<?php

namespace Awcodes\PresetColorPicker;

use Awcodes\PresetColorPicker\Testing\TestsPresetColorPicker;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PresetColorPickerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'preset-color-picker';

    public static string $viewNamespace = 'preset-color-picker';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews();
    }

    public function packageBooted(): void
    {
        Testable::mixin(new TestsPresetColorPicker);
    }
}
