<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStickerSizeIdToStickerCategoryStickerSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sticker_category_sticker_size', function (Blueprint $table) {
            $table->integer("sticker_size_id")->unsigned();
            $table->foreign("sticker_size_id")
                ->references("id")->on("sticker_sizes")
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
        Schema::table('sticker_category_sticker_size', function (Blueprint $table) {
            $table->dropForeign('sticker_category_sticker_size_sticker_size_id_foreign');
            $table->dropColumn("sticker_size_id");
        });
    }
}
