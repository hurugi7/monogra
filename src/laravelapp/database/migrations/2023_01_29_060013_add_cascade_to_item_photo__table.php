<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCascadeToItemPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_photos', function (Blueprint $table) {
            $table->dropForeign('item_photos_item_id_foreign');
            $table->dropColumn('item_id');
        });

        Schema::table('item_photos', function (Blueprint $table) {
            $table->foreignId('item_id')
            ->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_photos', function (Blueprint $table) {
            //
        });
    }
}
