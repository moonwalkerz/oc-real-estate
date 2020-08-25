<?php namespace Fiveupmedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeUnits13 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->integer('operation_id')->default(0)->change();
            $table->boolean('published')->default(0)->change();
            $table->decimal('surface', 12, 2)->default(0)->change();
            $table->decimal('price', 12, 2)->default(0)->change();
            $table->integer('rooms')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->integer('operation_id')->default(NULL)->change();
            $table->boolean('published')->default(NULL)->change();
            $table->decimal('surface', 12, 2)->default(NULL)->change();
            $table->decimal('price', 12, 2)->default(NULL)->change();
            $table->integer('rooms')->default(NULL)->change();
        });
    }
}
