<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\{Gender, MaritalStatus};
use App\Util\BluePrintUtil;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(User::TABLE, function (Blueprint $table) {
            BluePrintUtil::primaryKey($table);
            $table->string(User::EMAIL)->unique();
            $table->string(User::FULLNAME);
            $table->string(User::FULLNAME_FATHER);
            $table->string(User::FULLNAME_MOTHER);
            $table->string(User::NUMBER_BI)->unique();
            $table->string(User::PASSWORD);
            $table->date(User::BIRTHDAY);
            $table->enum(User::GENDER, Gender::keys());
            $table->enum(User::MARITAL_STATUS, MaritalStatus::keys());
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            BluePrintUtil::commonFields($table);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(User::TABLE);
    }

};
