<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderIdToOrderStickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_stickers', function (Blueprint $table) {
            $table->integer("order_id")->unsigned();
            $table->foreign("order_id")
                ->references("id")->on("orders")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_stickers', function (Blueprint $table) {
            $table->dropForeign("order_stickers_order_id_foreign");
            $table->dropColumn("order_id");
        });
    }
}
