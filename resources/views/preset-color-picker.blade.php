<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="{
            state: $wire.{{ $applyStateBindingModifiers("\$entangle('{$getStatePath()}')") }}
        }"
        class="fi-preset-color-picker flex items-center flex-wrap gap-3"
    >
        @foreach($getColors() as $key => $color)
            <label
                x-data
                style="background-color: rgba({{ $color[500] }}, 1);"
                class="fi-preset-color-picker-item size-8 rounded-full cursor-pointer focus-within:ring-primary-500 focus-within:outline focus-within:outline-primary-300 focus-within:outline-2 focus-within:outline-offset-2"
                x-bind:class="{
                    'fi-preset-color-picker-item-active ring-2 ring-primary-500': state === '{{ $key }}',
                    'ring-1 ring-gray-400 dark:ring-gray-700': state !== '{{ $key }}',
                }"
                x-tooltip="{
                    content: @js(str($key)->title()->replace('-', ' ')),
                    theme: $store.theme,
                }"
            >
                <input
                    type="radio"
                    x-model="state"
                    value="{{ $key }}"
                    class="opacity-0 pointer-events-none"
                />
                <span class="sr-only">{{ str($key)->title()->replace('-', ' ') }}</span>
            </label>
        @endforeach
    </div>
</x-dynamic-component>
