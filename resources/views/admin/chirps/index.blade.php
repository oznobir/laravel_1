<x-admin-layout>
    <x-slot name="head_title">
        {{ __('Chirps') }}
    </x-slot>

    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ __('Chirps') }}</h3>

        <div class="mt-8">
            <a href="{{ route('admin.chirps.create') }}"
               class="text-indigo-600 hover:text-indigo-900"
            >{{ __('Add') }}</a>
        </div>

        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                {{ __('Heading') }}
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                        </thead>

                        <tbody class="bg-white">
                        @foreach($chirps as $chirp)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $chirp->message }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">

                                    <a href="{{ route('admin.posts.edit', $chirp->post) }}"
                                       class="text-indigo-600 hover:text-indigo-900"
                                    >{{ $chirp->post->title }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">

                                    <a href="{{ route('admin.users.show', $chirp->user) }}"
                                       class="text-indigo-600 hover:text-indigo-900"
                                    >{{ $chirp->user->name }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">

                                    <a href="{{ route('admin.chirps.edit', $chirp) }}"
                                       class="text-indigo-600 hover:text-indigo-900"
                                    >{{ __('Edit') }}</a>
                                    <form action="{{ route('admin.chirps.destroy', $chirp) }}"
                                          method="post"
                                    >
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-900"
                                        >{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-8">
            {{ $chirps->links() }}
        </div>
    </div>
</x-admin-layout>