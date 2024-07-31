<?php

namespace Awcodes\PresetColorPicker\Tests\Fixtures;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class TestForm extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    public ?array $data = [];

    public static function make(): static
    {
        return new static;
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    public function save(): array
    {
        return $this->form->getState();
    }

    public function render(): string
    {
        return <<<'HTML'
        <div>{{ $this->form }}</div>
        HTML;
    }
}
