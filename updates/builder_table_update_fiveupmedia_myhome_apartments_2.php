<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeApartments2 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
