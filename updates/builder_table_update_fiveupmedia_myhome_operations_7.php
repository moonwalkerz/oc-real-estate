<?php namespace Fiveupmedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFiveupmediaMyhomeOperations7 extends Migration
{
    public function up()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->text('description')->default(null)->change();
            $table->string('lat', 191)->default(null)->change();
            $table->string('lon', 191)->default(null)->change();
            $table->boolean('published')->default(0)->change();
            $table->text('address')->default(null)->change();
            $table->string('city', 191)->default(null)->change();
            $table->string('state', 191)->default(null)->change();
            $table->string('country', 191)->default(null)->change();
            $table->text('zip')->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fiveupmedia_myhome_operations', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
            $table->text('description')->default('NULL')->change();
            $table->string('lat', 191)->default('NULL')->change();
            $table->string('lon', 191)->default('NULL')->change();
            $table->boolean('published')->default(NULL)->change();
            $table->text('address')->default('NULL')->change();
            $table->string('city', 191)->default('NULL')->change();
            $table->string('state', 191)->default('NULL')->change();
            $table->string('country', 191)->default('NULL')->change();
            $table->text('zip')->default('NULL')->change();
        });
    }
}
