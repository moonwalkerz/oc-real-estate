<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeUnits9 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->string('zip')->change();
            $table->decimal('surface', 12, 2)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->string('zip', 191)->change();
            $table->decimal('surface', 6, 2)->change();
        });
    }
}
