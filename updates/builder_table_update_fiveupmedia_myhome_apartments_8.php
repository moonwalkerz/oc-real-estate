<?php namespace Fiveupmedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeApartments8 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->decimal('price', 6, 2)->default(0)->change();
            $table->integer('rooms')->default(0)->change();
            $table->integer('order')->default(0)->change();

        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->decimal('price', 6, 2)->default(null)->change();
            $table->integer('rooms')->default(null)->change();
            $table->integer('order')->default(null)->change();

        });
    }
}
