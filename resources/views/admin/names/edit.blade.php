<x-admin-layout>
    <x-slot name="head_title">
        {{ __('Edit name') }}
    </x-slot>
        <div class="container mx-auto px-6 py-8">
            <h3 class="text-gray-500 text-3xl font-medium">{{ __('Edit name') }}:</h3>
            <div class="mt-8">
                {{ $name->full_name }}
            </div>

            <div class="mt-8">
                <form action="{{ route('admin.names.update', $name) }}"
                      method="post"
                      enctype="multipart/form-data"
                      class="space-y-5 mt-5"
                >
                    @csrf
                    @method('put')
                    <input name="first_name"
                           type="text"
                           value="{{ old('first_name', $name->first_name) }}"
                           class="w-full h-12 border @error('first_name') border-red-500 @enderror rounded px-3"
                           placeholder="{{ __('validation.attributes.first_name') }}"
                    />
                    @error('first_name')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <input name="last_name"
                           type="text"
                           value="{{ old('last_name', $name->last_name) }}"
                           class="w-full h-12 border @error('last_name') border-red-500 @enderror rounded px-3"
                           placeholder="{{ __('validation.attributes.last_name') }}"
                    />
                    @error('last_name')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <input name="password"
                           type="text"
                           value="{{ old('password') }}"
                           class="w-full h-12 border @error('password') border-red-500 @enderror rounded px-3"
                           placeholder="{{ __('validation.attributes.password') }}"
                    />
                    @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror

                    <div class="bg-white">
                        <div class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">
                                <div>{{ __('Roles') }}:</div>
                                @foreach($name->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            </div>
                        </div>
                        <div class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-900">
                                <div>{{ __('Permissions') }}:</div>
                                @foreach($name->permissions as $permission)
                                    {{ $permission->name }}
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="text-center w-48 bg-blue-900 rounded-md text-white py-3 font-medium">
                        {{ __('Save') }}
                    </button>
                </form>
            </div>
        </div>
</x-admin-layout>