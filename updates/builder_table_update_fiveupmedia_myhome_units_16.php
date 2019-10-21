<?php namespace Fiveupmedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeUnits16 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->boolean('frontpage')->default(0);
            $table->integer('operation_id')->unsigned()->default(0)->change();
            $table->text('description')->default(null)->change();
            $table->string('address', 191)->default(null)->change();
            $table->string('state', 191)->default(null)->change();
            $table->string('country', 191)->default(null)->change();
            $table->string('zip', 191)->default(null)->change();
            $table->text('lat')->default(null)->change();
            $table->text('lon')->default(null)->change();
            $table->boolean('published')->nullable(false)->default(0)->change();
            $table->boolean('status')->nullable(false)->change();
            $table->decimal('surface', 12, 2)->default(0)->change();
            $table->string('floor', 191)->default(null)->change();
            $table->string('house_type', 191)->default(null)->change();
            $table->string('heating', 191)->default(null)->change();
            $table->string('class', 191)->default(null)->change();
            $table->string('insulation', 191)->default(null)->change();
            $table->decimal('price', 12, 2)->default(0)->change();
            $table->integer('rooms')->default(0)->change();
            $table->string('city', 191)->default(null)->change();
            $table->string('matterport_id', 191)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_units', function($table)
        {
            $table->dropColumn('frontpage');
            $table->integer('operation_id')->unsigned(false)->default(NULL)->change();
            $table->text('description')->default('NULL')->change();
            $table->string('address', 191)->default('NULL')->change();
            $table->string('state', 191)->default('NULL')->change();
            $table->string('country', 191)->default('NULL')->change();
            $table->string('zip', 191)->default('NULL')->change();
            $table->text('lat')->default('NULL')->change();
            $table->text('lon')->default('NULL')->change();
            $table->boolean('published')->nullable()->default(NULL)->change();
            $table->boolean('status')->nullable()->change();
            $table->decimal('surface', 12, 2)->default(NULL)->change();
            $table->string('floor', 191)->default('NULL')->change();
            $table->string('house_type', 191)->default('NULL')->change();
            $table->string('heating', 191)->default('NULL')->change();
            $table->string('class', 191)->default('NULL')->change();
            $table->string('insulation', 191)->default('NULL')->change();
            $table->decimal('price', 12, 2)->default(NULL)->change();
            $table->integer('rooms')->default(NULL)->change();
            $table->string('city', 191)->default('NULL')->change();
            $table->string('matterport_id', 191)->default('NULL')->change();
        });
    }
}
