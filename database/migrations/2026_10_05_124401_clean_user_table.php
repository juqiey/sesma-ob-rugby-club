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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('email');
            $table->string('role')->after('username');
            $table->string('profile_url')->nullable()->after('role');
            $table->string('created_by')->nullable()->after('profile_url');
            $table->dropColumn('avatar');
            $table->dropColumn('position');
            $table->dropColumn('department');
            $table->dropColumn('seconde_line_manager');
            $table->dropColumn('role_name');
            $table->dropColumn('line_manager');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
