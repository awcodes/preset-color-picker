<?php

namespace Awcodes\PresetColorPicker;

use Closure;
use Filament\Forms\Components\Concerns\HasExtraInputAttributes;
use Filament\Forms\Components\Field;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Support\Collection;

class PresetColorPicker extends Field
{
    use HasExtraInputAttributes;

    protected string $view = 'preset-color-picker::preset-color-picker';

    protected array | Closure | null $colors = null;

    protected bool | Closure | null $hasWhite = null;

    protected bool | Closure | null $hasBlack = null;

    protected ?string $swapWhite = null;

    protected ?string $swapBlack = null;

    protected string | Closure | null $size = null;

    /**
     * @param  array<Color>|Closure  $colors
     */
    public function colors(array | Closure $colors): static
    {
        $this->colors = $colors;

        return $this;
    }

    public function size(string | Closure $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function withWhite(bool | Closure $hasWhite = true, ?string $swap = null): static
    {
        $this->hasWhite = $hasWhite;
        $this->swapWhite = $swap;

        return $this;
    }

    public function withBlack(bool | Closure $hasBlack = true, ?string $swap = null): static
    {
        $this->hasBlack = $hasBlack;
        $this->swapBlack = $swap;

        return $this;
    }

    /**
     * @return array<Color>
     */
    public function getColors(): array | Collection
    {
        $colors = $this->evaluate($this->colors) ?? FilamentColor::getColors();

        if ($this->hasWhite()) {
            $colors['white'] = Color::hex($this->swapWhite ?? '#ffffff');
        }

        if ($this->hasBlack()) {
            $colors['black'] = Color::hex($this->swapBlack ?? '#000000');
        }

        return Utils::processColors($colors);
    }

    public function getSize(): string
    {
        return $this->evaluate($this->size) ?? 'md';
    }

    public function hasWhite(): bool
    {
        return $this->evaluate($this->hasWhite) ?? false;
    }

    public function hasBlack(): bool
    {
        return $this->evaluate($this->hasBlack) ?? false;
    }
}
