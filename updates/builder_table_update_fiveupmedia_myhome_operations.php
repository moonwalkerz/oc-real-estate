<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeOperations extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {
            $table->boolean('home')->default(0);
            $table->increments('id')->unsigned(false)->change();
            $table->string('name')->change();
            $table->string('lat')->change();
            $table->string('lon')->change();
            $table->string('city')->change();
            $table->string('state')->change();
            $table->string('country')->change();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {
            $table->dropColumn('home');
            $table->increments('id')->unsigned()->change();
            $table->string('name', 191)->change();
            $table->string('lat', 191)->change();
            $table->string('lon', 191)->change();
            $table->string('city', 191)->change();
            $table->string('state', 191)->change();
            $table->string('country', 191)->change();
        });
    }
}
