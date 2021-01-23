<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SourcesCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_sources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->timestamps();
        });
        Schema::table('news', function (Blueprint $table){
            $table->unsignedBigInteger('source_id');
            $table->foreign('source_id')->on('news_sources')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table){
            $table->dropForeign('news_source_id_foreign');
            $table->dropColumn('source_id');
        });
        Schema::dropIfExists('news_sources');
    }
}
