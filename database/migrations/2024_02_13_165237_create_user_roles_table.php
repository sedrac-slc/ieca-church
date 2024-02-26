<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{User, Role, UserRole};
use App\Util\BluePrintUtil;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(UserRole::TABLE, function (Blueprint $table) {
            BluePrintUtil::primaryKey($table);
            $table->foreignUuid(UserRole::USER_ID)->constrained(User::TABLE)->cascadeOnDelete();
            $table->foreignUuid(UserRole::ROLE_ID)->constrained(Role::TABLE)->cascadeOnDelete();
            $table->unique([UserRole::ROLE_ID, UserRole::USER_ID]);
            BluePrintUtil::commonFields($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(UserRole::TABLE);
    }
};
