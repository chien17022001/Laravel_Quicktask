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
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');
            $table->string('username')->after('last_name');
            $table->boolean('is_admin')->default(1)->after('password');
            $table->boolean('is_active')->default(1)->after('is_admin');
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'is_admin',
                'is_active',
                'first_name',
                'last_name',
            ]);
            $table->string('name')->after('id');
        });
    }
};
