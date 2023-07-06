<div class="mb-4">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-700">{{ ucwords($title) }}</label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none" value="{{ old($name) }}" {{$attributes}}>
</div>

<x-form.error name="{{ $name }}" />
