<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('posts.chirps.update', [$post, $chirp]) }}">
            @csrf
            @method('patch')
            <textarea
                    name="message"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $chirp->message) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2"/>
            <div class="mt-4 space-x-2">
                <x-primary-button>Сохранить</x-primary-button>
                <a class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out"
                   href="{{ route('posts.show', $post) }}">Отмена</a>
            </div>
        </form>
    </div>
</x-app-layout>