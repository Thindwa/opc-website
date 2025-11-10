@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

<x-filament-panels::page>
    <div class="space-y-8">
        <!-- Welcome Header -->
        <div class="dashboard-welcome bg-gradient-to-r from-primary-600 to-primary-700 dark:from-primary-800 dark:to-primary-900 overflow-hidden shadow-xl rounded-xl">
            <div class="px-6 py-8 sm:px-8 sm:py-10">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="h-16 w-16 bg-white/20 rounded-xl flex items-center justify-center">
                                <x-heroicon-o-building-office-2 class="h-10 w-10 text-white" />
                            </div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-white">
                                Welcome to OPC Admin Dashboard
                            </h1>
                            <p class="text-primary-100 text-lg">
                                Office of the President and Cabinet
                            </p>
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <div class="text-right text-white">
                            <p class="text-sm text-primary-100">Last updated</p>
                            <p class="text-lg font-semibold">{{ now()->format('M j, Y g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @livewire(\App\Filament\Widgets\ContentStatsWidget::class)
            @livewire(\App\Filament\Widgets\OrganizationStatsWidget::class)
            @livewire(\App\Filament\Widgets\SecurityDashboardWidget::class)
        </div>

        <!-- Main Content Area -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Left Column - Recent Activities & Quick Actions -->
            <div class="xl:col-span-2 space-y-8">
                                <!-- Recent Activities -->
                <div class="widget-card bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <x-heroicon-o-clock class="h-5 w-5 text-primary-600 mr-2" />
                                Recent Activities
                            </h2>
                            <a href="{{ route('filament.admin.resources.activity-logs.index') }}"
                               class="text-sm text-primary-600 hover:text-primary-700 font-medium transition-colors">
                                View All →
                            </a>
                        </div>
                    </div>
                    <div class="p-0 custom-scrollbar">
                        @livewire(\App\Filament\Widgets\RecentActivitiesWidget::class)
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="widget-card bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <x-heroicon-o-bolt class="h-5 w-5 text-primary-600 mr-2" />
                            Quick Actions
                        </h2>
                    </div>
                    <div class="p-6">
                        @livewire(\App\Filament\Widgets\QuickActionsWidget::class)
                    </div>
                </div>
            </div>

            <!-- Right Column - Content & Events -->
            <div class="space-y-8">
                                <!-- Recent News -->
                <div class="widget-card bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <x-heroicon-o-newspaper class="h-5 w-5 text-primary-600 mr-2" />
                                Recent News
                            </h2>
                            <a href="{{ route('filament.admin.resources.news.index') }}"
                               class="text-sm text-primary-600 hover:text-primary-700 font-medium transition-colors">
                                View All →
                            </a>
                        </div>
                    </div>
                    <div class="p-0 custom-scrollbar">
                        @livewire(\App\Filament\Widgets\RecentNewsWidget::class)
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="widget-card bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <x-heroicon-o-calendar-days class="h-5 w-5 text-primary-600 mr-2" />
                                Upcoming Events
                            </h2>
                            <a href="{{ route('filament.admin.resources.events.index') }}"
                               class="text-sm text-primary-600 hover:text-primary-700 font-medium transition-colors">
                                View All →
                            </a>
                        </div>
                    </div>
                    <div class="p-0 custom-scrollbar">
                        @livewire(\App\Filament\Widgets\UpcomingEventsWidget::class)
                    </div>
                </div>
            </div>
        </div>

        <!-- Analytics Section -->
        <div class="widget-card bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <x-heroicon-o-chart-bar class="h-5 w-5 text-primary-600 mr-2" />
                    Content Analytics
                </h2>
            </div>
            <div class="p-6">
                @livewire(\App\Filament\Widgets\ContentChartWidget::class)
            </div>
        </div>
    </div>
</x-filament-panels::page>
