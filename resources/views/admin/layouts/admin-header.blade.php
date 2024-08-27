<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
        <button @click="sidebarOpen = true"
                class="text-gray-500 focus:outline-none lg:hidden"
        >
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"></path>
            </svg>
        </button>
    </div>

    <div class="flex items-center">
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = ! dropdownOpen"
                    class="px-4 py-1 text-indigo-800 rounded-md"
            >
                {{ auth('admin')->user()['full_name'] }}
            </button>

            <div x-show="dropdownOpen"
                 @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                 style="display: none;"
            ></div>
            <div x-show="dropdownOpen"
                 class="absolute right-0 mt-2 w-48 bg-indigo-200 rounded-md overflow-hidden shadow-xl z-10"
                 style="display: none;"
            >
                <a href="{{ route('admin.logout') }}"
                   class="block px-4 py-2 text-sm text-gray-700 bg-indigo-100 hover:bg-indigo-600 hover:text-white"
                >Выйти</a>
            </div>
        </div>
    </div>
</header>