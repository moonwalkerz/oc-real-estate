<?php namespace Fiveupmedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeOperations6 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {

            $table->boolean('published')->default(0)->change();

            $table->integer('order')->default(0)->change();

        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {

            $table->boolean('published')->default(NULL)->change();

            $table->integer('order')->default(null)->change();

        });
    }
}
