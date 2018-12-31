<?php namespace Fiveupmedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeOperations5 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {
            $table->integer('order');
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {
            $table->dropColumn('order');
        });
    }
}
