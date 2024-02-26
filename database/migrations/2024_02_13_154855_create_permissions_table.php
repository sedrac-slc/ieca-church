<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Util\BluePrintUtil;
use App\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Permission::TABLE, function (Blueprint $table) {
            BluePrintUtil::primaryKey($table);
            $table->string(Permission::NAME)->unique();
            $table->string(Permission::DESCRIPTION)->unique();
            BluePrintUtil::commonFields($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Permission::TABLE);
    }
};
