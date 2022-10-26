<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class CreateProductAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_audits', function (Blueprint $table) {
            $table->id();
            $table->string('changed_field');
            $table->string('old_value');
            $table->string('new_value');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('changed_at')->nullable()->default(Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_audits');
    }
}
