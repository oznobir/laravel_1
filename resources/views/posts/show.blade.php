<x-app-layout>
    <x-slot name="head_title">
        {{ $post->title }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden  sm:rounded-lg shadow-2xl">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex p-6 gap-6">
                        <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="img">
                        <div class="font-bold text-2xl text-gray-800 dark:text-gray-100">{!! $post->preview !!}</div>
                    </div>
                    <div class="px-4 py-2 mt-2">
                        <p class="sm:text-sm text-xl px-2 mr-1 my-3">
                            {!! $post->description !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <form method="POST" action="{{ route('chirps.store', $post) }}">
                    @csrf
                    <textarea name="message"
                              placeholder="Ваш комментарий ..."
                              class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >{{ old('message') }}</textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2"/>
                    <x-blue-button class="mt-4">Отправить</x-blue-button>
                </form>
                <div class="mt-6  bg-white text-gray-800 shadow-sm rounded-lg divide-y">
                    @foreach ($chirps as $chirp)
                        <div class="p-6 flex space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 -scale-x-100"
                                 fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span>{{ $chirp->user->name }}</span>
                                        <small class="ml-2 text-sm text-indigo-500">{{ $chirp->created_at }}</small>
                                        @unless ($chirp->created_at->eq($chirp->updated_at))
                                            <small>
                                                &middot;{{ __('Changed') }} {{ $chirp->updated_at }}
                                            </small>
                                        @endunless
                                    </div>
                                    @if ($chirp->user->is(auth()->user()))
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="h-4 w-4 text-gray-400"
                                                         viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('chirps.show', [$post, $chirp])">
                                                    {{ __('Change') }}
                                                </x-dropdown-link>
                                                <form method="POST" action="{{ route('chirps.destroy', [$post, $chirp]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('chirps.destroy', [$post, $chirp])"
                                                                     onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Delete') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    @endif
                                </div>
                                <p class="mt-4 text-lg text-gray-900">{{ $chirp->message }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>