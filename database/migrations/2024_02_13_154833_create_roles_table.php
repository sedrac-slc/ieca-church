<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Util\BluePrintUtil;
use App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Role::TABLE, function (Blueprint $table) {
            BluePrintUtil::primaryKey($table);
            $table->string(Role::NAME)->unique();
            $table->string(Role::DESCRIPTION);
            $table->boolean(Role::TYPE_SYSTEM)->default(false);
            BluePrintUtil::commonFields($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Role::TABLE);
    }
};
