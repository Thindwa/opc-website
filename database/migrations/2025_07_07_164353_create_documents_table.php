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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
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
            ]);
            $table->string('title');
            $table->string('file'); // path to the uploaded file
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
