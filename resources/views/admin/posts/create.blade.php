<x-admin-layout>
    <x-slot name="head_title">
        {{ __('Add post') }}
    </x-slot>
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">
            {{ __('Add post') }}
        </h3>
        <div class="mt-8">
            <form action="{{ route('admin.posts.store') }}"
                  method="post"
                  enctype="multipart/form-data"
                  class="space-y-5 mt-5"
            >
                @csrf
                <input name="title"
                       type="text"
                       value="{{ old('title') }}"
                       class="w-full h-12 border @error('title') border-red-500 @enderror rounded px-3"
                       placeholder="{{ __('validation.attributes.title') }}"
                />
                @error('title')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input name="preview"
                       type="text"
                       value="{{ old('preview') }}"
                       class="w-full h-12 border @error('preview') border-red-500 @enderror rounded px-3"
                       placeholder="{{ __('validation.attributes.preview') }}"
                />
                @error('preview')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <textarea name="description"
                          class="w-full border @error('title') border-red-500 @enderror rounded px-3"
                          rows="6"
                          placeholder="{{ __('validation.attributes.description') }}"
                >{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input type="file"
                       name="thumbnail"
                       class="w-full h-12"
                       placeholder="{{ __('validation.attributes.thumbnail') }}"
                />
                @error('thumbnail')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <button type="submit" class="text-center w-48 bg-blue-900 rounded-md text-white py-3 font-medium">
                    {{ __('Save') }}
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>