<footer class="py-16 text-center text-sm text-black dark:text-white/70">
    {{ $slot }}
    <div class="pt-3 text-center">
        {{ $foot_title }}{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</footer>