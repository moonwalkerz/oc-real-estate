<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeOperations4 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {
            $table->renameColumn('home', 'frontpage');
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {
            $table->renameColumn('frontpage', 'home');
        });
    }
}
