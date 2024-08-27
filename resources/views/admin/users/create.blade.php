<x-admin-layout>
    <x-slot name="head_title">
        {{ __('Add user') }}
    </x-slot>
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">
            {{ __('Add user') }}
        </h3>
        <div class="mt-8">
            <form action="{{ route('admin.users.store') }}"
                  method="post"
                  enctype="multipart/form-data"
                  class="space-y-5 mt-5"
            >
                @csrf
                <input name="name"
                       type="text"
                       value="{{ old('name') }}"
                       class="w-full h-12 border @error('name') border-red-500 @enderror rounded px-3"
                       placeholder="{{ __('validation.attributes.name') }}"
                />
                @error('name')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="email"
                       type="email"
                       value="{{ old('email') }}"
                       class="w-full h-12 border @error('email') border-red-500 @enderror rounded px-3"
                       placeholder="{{ __('validation.attributes.email') }}"
                />
                @error('email')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="password"
                       type="password"
                       value="{{ old('password') }}"
                       class="w-full h-12 border @error('password') border-red-500 @enderror rounded px-3"
                       placeholder="{{ __('Password') }}"
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