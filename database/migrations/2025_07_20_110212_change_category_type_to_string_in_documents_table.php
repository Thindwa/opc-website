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
        Schema::table('documents', function (Blueprint $table) {
            $table->string('category_type')->change();
        });
    }

    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            // fallback to enum if needed (original definition)
            $table->enum('category_type', [
                'Speeches',
                'Strategic-plan',
                'Press-Releases',
                'Regulations',
                'Reports',
                'Acts and Laws',
                'Miscellaneous',
                'Tenders',
                'Vacancies',
                'Advertisements',
                'Others',
            ])->change();
        });
    }

};
