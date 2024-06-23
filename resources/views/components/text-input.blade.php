<div>
    <input type="text" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        id="{{ $name }}"
        class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2">

    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>
