<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(
            "ALTER TABLE ministers MODIFY position_type ENUM('President', 'VP', 'Second_VP', 'Ministers')"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("UPDATE ministers SET position_type = 'Ministers' WHERE position_type = 'Second_VP'");

        DB::statement(
            "ALTER TABLE ministers MODIFY position_type ENUM('President', 'VP', 'Ministers')"
        );
    }
};

