<?php namespace Fiveupmedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeApartments5 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->integer('order');
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->dropColumn('order');
        });
    }
}
