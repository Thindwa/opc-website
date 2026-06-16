<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('badge')->nullable();
            $table->text('message');
            $table->string('image')->nullable();
            $table->string('style')->default('warning');
            $table->unsignedInteger('priority')->default(0);
            $table->string('placement')->default('popup');
            $table->string('cta_label')->nullable();
            $table->text('cta_url')->nullable();
            $table->boolean('cta_target_blank')->default(false);
            $table->string('secondary_cta_label')->nullable();
            $table->text('secondary_cta_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_dismissible')->default(true);
            $table->boolean('show_once_per_session')->default(true);
            $table->boolean('show_on_homepage')->default(true);
            $table->boolean('show_on_all_pages')->default(true);
            $table->unsignedInteger('dismiss_for_hours')->default(12);
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();

            $table->index(['is_active', 'placement', 'priority'], 'site_announcements_active_priority_index');
            $table->index(['starts_at', 'ends_at'], 'site_announcements_schedule_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_announcements');
    }
};
