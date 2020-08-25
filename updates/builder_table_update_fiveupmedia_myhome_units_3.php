<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeUnits3 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->string('type')->nullable();
            $table->string('contract')->nullable();
            $table->decimal('surface', 12, 2)->default(0);
            $table->string('floor')->nullable();
            $table->string('house_type')->nullable();
            $table->string('heating')->nullable();
            $table->string('class')->nullable();
            $table->string('insulation')->nullable();
            $table->boolean('status')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->dropColumn('type');
            $table->dropColumn('contract');
            $table->dropColumn('surface');
            $table->dropColumn('floor');
            $table->dropColumn('house_type');
            $table->dropColumn('heating');
            $table->dropColumn('class');
            $table->dropColumn('insulation');
            $table->boolean('status')->nullable(false)->change();
        });
    }
}
