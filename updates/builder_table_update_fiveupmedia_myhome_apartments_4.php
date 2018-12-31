<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeApartments4 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->decimal('price', 6, 2)->nullable();
            $table->integer('rooms')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->dropColumn('price');
            $table->dropColumn('rooms');
        });
    }
}
