<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeUnits7 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->string('city')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->string('city', 191)->nullable(false)->change();
        });
    }
}
