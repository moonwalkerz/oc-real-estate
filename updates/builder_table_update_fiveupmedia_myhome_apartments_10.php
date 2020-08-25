<?php namespace Fiveupmedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeApartments10 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->string('matterport_id')->nullable();
           

        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->dropColumn('matterport_id');
           

        });
    }
}
