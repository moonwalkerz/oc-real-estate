<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeUnits2 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->boolean('status')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->dropColumn('status');
        });
    }
}
