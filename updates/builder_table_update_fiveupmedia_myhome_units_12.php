<?php namespace Fiveupmedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeUnits12 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->integer('operation_id')->default(0)->change();
            $table->boolean('published')->default(0)->change();
            $table->integer('rooms')->default(0)->change();
            $table->integer('order')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->integer('operation_id')->default(null)->change();
            $table->boolean('published')->default(null)->change();
            $table->integer('rooms')->default(null)->change();
            $table->integer('order')->default(null)->change();
        });
    }
}
