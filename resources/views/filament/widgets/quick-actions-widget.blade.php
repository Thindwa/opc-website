<x-filament-widgets::widget>
    <x-filament::section>
        <x-slot name="heading">
            Quick Actions
        </x-slot>

        <x-slot name="description">
            Quickly create new content for your website
        </x-slot>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($this->getActions() as $action)
        <a href="{{ $action['url'] }}" class="group block">
            <div class="bg-gray-50 dark:bg-gray-700 hover:bg-primary-50 dark:hover:bg-primary-900/20 rounded-lg p-4 transition-all duration-200 hover:shadow-md border border-gray-200 dark:border-gray-600 hover:border-primary-300 dark:hover:border-primary-700">
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 bg-primary-100 dark:bg-primary-900/30 rounded-lg flex items-center justify-center group-hover:bg-primary-200 dark:group-hover:bg-primary-800/40 transition-colors">
                            <x-dynamic-component :component="$action['icon']" class="h-5 w-5 text-primary-600 dark:text-primary-400" />
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-white group-hover:text-primary-700 dark:group-hover:text-primary-300 transition-colors">
                            {{ $action['label'] }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $action['description'] ?? 'Click to manage' }}
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <x-heroicon-o-arrow-right class="h-4 w-4 text-gray-400 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors" />
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
    </x-filament::section>
</x-filament-widgets::widget>
