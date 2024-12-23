@props(['label', 'type' => 'text', 'id', 'name', 'placeholder' => '', 'required' => false])

<div>
    <label for="{{ $id }}" class="mb-2 block text-sm font-medium text-gray-900">{{ $label }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"
        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }} />
</div>

