<?php namespace NielsVanDenDries\AgeVerification\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNielsvandendriesAgeverificationIp extends Migration
{
    public function up()
    {
        Schema::create('nielsvandendries_ageverification_ip', function($table)
        {
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('ip')->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nielsvandendries_ageverification_ip');
    }
}
