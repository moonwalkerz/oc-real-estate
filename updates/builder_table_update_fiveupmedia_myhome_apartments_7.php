<?php namespace Fiveupmedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeApartments7 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->integer('unit_id')->nullable()->change();
            $table->string('name', 191)->nullable()->change();
            $table->decimal('price', 6, 2)->default(null)->change();
            $table->integer('rooms')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->integer('unit_id')->nullable(false)->change();
            $table->string('name', 191)->nullable(false)->change();
            $table->decimal('price', 6, 2)->default(NULL)->change();
            $table->integer('rooms')->default(NULL)->change();
        });
    }
}
