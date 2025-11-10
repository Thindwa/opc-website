<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\ActivityLoggingService;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class TestActivityLogging extends Command
{
    protected $signature = 'test:activity-logging';
    protected $description = 'Test activity logging functionality';

    public function handle()
    {
        $this->info('Testing Activity Logging System...');

        // Get a user for testing
        $user = User::first();
        if (!$user) {
            $this->error('No users found. Please create a user first.');
            return;
        }

        $this->info("Testing with user: {$user->name} ({$user->email})");

        // Create a mock request
        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'REMOTE_ADDR' => '192.168.1.100',
        ]);

        $activityService = app(ActivityLoggingService::class);

        // Test login logging
        $this->info('Testing login logging...');
        $loginLog = $activityService->logLogin($user, $request);
        $this->info("✓ Login logged with ID: {$loginLog->id}");

        // Test logout logging
        $this->info('Testing logout logging...');
        $logoutLog = $activityService->logLogout($user, $request);
        $this->info("✓ Logout logged with ID: {$logoutLog->id}");

        // Test generic activity
        $this->info('Testing generic activity logging...');
        $genericLog = $activityService->logActivity('test_action', null, $user, [
            'test_data' => 'This is a test',
            'timestamp' => now()->toISOString(),
        ], $request);
        $this->info("✓ Generic activity logged with ID: {$genericLog->id}");

        // Test resource creation logging
        $this->info('Testing resource creation logging...');
        $createLog = $activityService->logCreate($user, $user, $request);
        $this->info("✓ Resource creation logged with ID: {$createLog->id}");

        // Test resource update logging
        $this->info('Testing resource update logging...');
        $oldData = $user->getAttributes();
        $user->name = 'Updated Name';
        $updateLog = $activityService->logUpdate($user, $oldData, $user, $request);
        $this->info("✓ Resource update logged with ID: {$updateLog->id}");

        // Test resource view logging
        $this->info('Testing resource view logging...');
        $viewLog = $activityService->logView($user, $user, $request);
        $this->info("✓ Resource view logged with ID: {$viewLog->id}");

        // Show activity statistics
        $this->info('Activity Statistics:');
        $stats = $activityService->getActivityStats(1);
        foreach ($stats as $key => $value) {
            $this->line("  {$key}: {$value}");
        }

        // Show recent activities
        $this->info('Recent Activities:');
        $recentActivities = $activityService->getRecentUserActivities($user, 5);
        foreach ($recentActivities as $activity) {
            $this->line("  - {$activity->formatted_action} at {$activity->created_at->format('Y-m-d H:i:s')}");
            $this->line("    Device: {$activity->device_info}");
            $this->line("    IP: {$activity->ip_address}");
        }

        $this->info('Activity logging test completed successfully!');
    }
}
