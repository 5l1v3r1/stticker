<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdToStickerCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sticker_categories', function (Blueprint $table) {
            $table->integer("parent_id")->unsigned()->nullable()->after("id");

            $table->foreign("parent_id")
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
        Schema::table('sticker_categories', function (Blueprint $table) {
            $table->dropForeign("sticker_categories_parent_id_foreign");
            $table->dropColumn("parent_id");
        });
    }
}
