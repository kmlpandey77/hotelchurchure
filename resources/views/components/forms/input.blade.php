<div {{ $attributes->merge(['class' => '']) }}>
    @if($label)
        <label for="{{$name}}" class="block mb-2 text-sm font-medium text-gray-900">{{$label}}</label>
    @endif
    <input type="{{$type}}"
           id="{{$name}}"
           name="{{$name}}"
           value="{{$value}}"
           class="bg-gray-50 border text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{ $errors->has($name) ? 'border-red-600':'border-primary' }}"
           placeholder="{{$label}}">
    @error($name)
        <div class="text-red-600 text-sm">{{$message}}</div>
    @enderror
</div>