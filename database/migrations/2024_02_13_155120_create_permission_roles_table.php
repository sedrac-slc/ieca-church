<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{Permission, Role, PermissionRole};
use App\Util\BluePrintUtil;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(PermissionRole::TABLE, function (Blueprint $table) {
            BluePrintUtil::primaryKey($table);
            $table->foreignUuid(PermissionRole::PERMISSION_ID)->constrained(Permission::TABLE)->cascadeOnDelete();
            $table->foreignUuid(PermissionRole::ROLE_ID)->constrained(Role::TABLE)->cascadeOnDelete();
            $table->unique([PermissionRole::ROLE_ID, PermissionRole::PERMISSION_ID]);
            BluePrintUtil::commonFields($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(PermissionRole::TABLE);
    }
};
