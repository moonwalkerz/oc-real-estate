<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeUnits5 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->renameColumn('contry', 'country');
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->renameColumn('country', 'contry');
        });
    }
}
