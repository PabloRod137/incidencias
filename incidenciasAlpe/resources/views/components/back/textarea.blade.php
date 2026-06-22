@props(['label', 'name', 'value' => '', 'required' => false, 'placeholder' => '', 'rows' => 4])

<div class="space-y-2">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-bold text-slate-700">{{ $label }}</label>
    @endif
    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}" 
              @if($required) required @endif
              placeholder="{{ $placeholder }}"
              {{ $attributes->merge(['class' => 'w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-alpe-blue focus:border-transparent outline-none transition-all']) }}>{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
