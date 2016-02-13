<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStickerCategoryIdToStickersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stickers', function (Blueprint $table) {
            $table->integer("sticker_category_id")->unsigned()->after("id");
            $table->foreign("sticker_category_id")
                  ->references("id")->on("sticker_categories")
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
        Schema::table('stickers', function (Blueprint $table) {
            $table->dropForeign("stickers_sticker_category_id_foreign");
            $table->dropColumn("sticker_category_id");
        });
    }
}
