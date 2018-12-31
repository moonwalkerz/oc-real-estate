<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeUnits6 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->string('city');
            $table->decimal('price', 12, 2)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->dropColumn('city');
            $table->decimal('price', 6, 2)->change();
        });
    }
}
