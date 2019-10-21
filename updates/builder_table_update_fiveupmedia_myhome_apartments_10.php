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
            $table->integer('unit_id')->default(null)->change();
            $table->string('name', 191)->default(null)->change();
            $table->text('description')->default(null)->change();
            $table->string('address', 191)->default(null)->change();
            $table->string('city', 191)->default(null)->change();
            $table->string('state', 191)->default(null)->change();
            $table->string('country', 191)->default(null)->change();
            $table->string('slug', 191)->default(null)->change();
            $table->decimal('price', 6, 2)->default(null)->change();
            $table->integer('rooms')->default(null)->change();
            $table->string('zip', 191)->default(null)->change();
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_apartments', function($table)
        {
            $table->dropColumn('matterport_id');
            $table->integer('unit_id')->default(NULL)->change();
            $table->string('name', 191)->default('NULL')->change();
            $table->text('description')->default('NULL')->change();
            $table->string('address', 191)->default('NULL')->change();
            $table->string('city', 191)->default('NULL')->change();
            $table->string('state', 191)->default('NULL')->change();
            $table->string('country', 191)->default('NULL')->change();
            $table->string('slug', 191)->default('NULL')->change();
            $table->decimal('price', 6, 2)->default(NULL)->change();
            $table->integer('rooms')->default(NULL)->change();
            $table->string('zip', 191)->default('NULL')->change();
            $table->timestamp('created_at')->nullable()->default('NULL');
            $table->timestamp('updated_at')->nullable()->default('NULL');
            $table->timestamp('deleted_at')->nullable()->default('NULL');
        });
    }
}
