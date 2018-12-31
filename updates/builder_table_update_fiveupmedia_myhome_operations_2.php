<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeOperations2 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
