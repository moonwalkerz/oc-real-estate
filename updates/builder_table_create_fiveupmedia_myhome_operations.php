<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFiveupmediaMyhomeOperations extends Migration
{
    public function up()
    {
        Schema::create('fiveupmedia_myhome_operations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->boolean('published')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->text('zip')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fiveupmedia_myhome_operations');
    }
}
