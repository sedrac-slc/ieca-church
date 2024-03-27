<?php

use App\Models\BaptismUser;
use App\Models\User;
use App\Util\BluePrintUtil;
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
        Schema::create(BaptismUser::USER_ID, function (Blueprint $table) {
            BluePrintUtil::primaryKey($table);
            $table->foreignUuid(BaptismUser::USER_ID)->constrained(User::TABLE)->unique()->cascadeOnDelete();
            $table->string(BaptismUser::BAPTISM_CONGREGATION);
            $table->string(BaptismUser::BAPTISM_LOCAL);
            $table->date(BaptismUser::BAPTISM_DATE);
            $table->string(BaptismUser::CONFIRM_CONGREGATION);
            $table->string(BaptismUser::CONFRIM_LOCAL);
            $table->date(BaptismUser::CONFRIM_DATE);
            $table->string(BaptismUser::RECEIVED_CONGREGATION);
            $table->string(BaptismUser::RECEIVED_LOCAL);
            $table->date(BaptismUser::RECEIVED_DATE);
            $table->date(BaptismUser::ISSUED_ON);
            BluePrintUtil::commonFields($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(BaptismUser::USER_ID);
    }
};
