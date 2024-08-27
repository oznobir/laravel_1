<x-admin-layout>
    <x-slot name="head_title">
        {{ __('Add name') }}
    </x-slot>
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">
            {{ __('Add name') }}
        </h3>
        <div class="mt-8">
            <form action="{{ route('admin.names.store') }}"
                  method="post"
                  enctype="multipart/form-data"
                  class="space-y-5 mt-5"
            >
                @csrf
                <input name="first_name"
                       type="text"
                       value="{{ old('first_name') }}"
                       class="w-full h-12 border @error('first_name') border-red-500 @enderror rounded px-3"
                       placeholder="{{ __('validation.attributes.first_name') }}"
                />
                @error('first_name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="last_name"
                       type="text"
                       value="{{ old('last_name') }}"
                       class="w-full h-12 border @error('last_name') border-red-500 @enderror rounded px-3"
                       placeholder="{{ __('validation.attributes.last_name') }}"
                />
                @error('last_name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="type"
                       type="text"
                       value="{{ old('type') }}"
                       class="w-full h-12 border @error('type') border-red-500 @enderror rounded px-3"
                       placeholder="{{ __('validation.attributes.type') }}"
                />
                @error('type')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input type="password"
                       name="password"
                       class="w-full h-12 border @error('password') border-red-500 @enderror rounded px-3"
                       placeholder="{{ __('validation.attributes.password') }}"
                />
                @error('password')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <button type="submit" class="text-center w-48 bg-blue-900 rounded-md text-white py-3 font-medium">
                    {{ __('Save') }}
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>