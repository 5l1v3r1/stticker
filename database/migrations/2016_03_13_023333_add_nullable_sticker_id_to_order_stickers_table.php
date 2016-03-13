<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableStickerIdToOrderStickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_stickers', function (Blueprint $table) {
            $table->integer("sticker_id")->unsigned()->nullable();
            $table->foreign("sticker_id")
                ->references("id")->on("stickers")
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
            $table->dropForeign("order_stickers_sticker_id_foreign");
            $table->dropColumn("sticker_id");
        });
    }
}
