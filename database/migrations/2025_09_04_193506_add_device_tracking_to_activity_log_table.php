<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('activity_log', function (Blueprint $table) {
            $table->string('ip_address')->nullable()->after('causer_id');
            $table->string('user_agent')->nullable()->after('ip_address');
            $table->string('device_name')->nullable()->after('user_agent');
            $table->string('device_type')->nullable()->after('device_name'); // mobile, desktop, tablet
            $table->string('browser_name')->nullable()->after('device_type');
            $table->string('browser_version')->nullable()->after('browser_name');
            $table->string('os_name')->nullable()->after('browser_version');
            $table->string('os_version')->nullable()->after('os_name');
            $table->string('action_type')->nullable()->after('os_version'); // login, logout, create, update, delete, view
            $table->string('resource_type')->nullable()->after('action_type'); // User, Page, News, etc.
            $table->string('resource_id')->nullable()->after('resource_type');
            $table->json('additional_data')->nullable()->after('resource_id');
            $table->string('session_id')->nullable()->after('additional_data');
            $table->timestamp('last_activity')->nullable()->after('session_id');

            // Add indexes for better performance
            $table->index(['ip_address', 'created_at']);
            $table->index(['causer_id', 'created_at']);
            $table->index(['action_type', 'created_at']);
            $table->index(['resource_type', 'resource_id']);
            $table->index('session_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activity_log', function (Blueprint $table) {
            $table->dropIndex(['ip_address', 'created_at']);
            $table->dropIndex(['causer_id', 'created_at']);
            $table->dropIndex(['action_type', 'created_at']);
            $table->dropIndex(['resource_type', 'resource_id']);
            $table->dropIndex('session_id');

            $table->dropColumn([
                'ip_address',
                'user_agent',
                'device_name',
                'device_type',
                'browser_name',
                'browser_version',
                'os_name',
                'os_version',
                'action_type',
                'resource_type',
                'resource_id',
                'additional_data',
                'session_id',
                'last_activity'
            ]);
        });
    }
};
