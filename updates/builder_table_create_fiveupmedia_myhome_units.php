<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFiveupmediaMyhomeUnits extends Migration
{
    public function up()
    {
        Schema::create('fiveupmedia_myhome_units', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('operation_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('contry')->nullable();
            $table->boolean('zip')->nullable();
            $table->text('lat')->nullable();
            $table->text('lon')->nullable();
            $table->boolean('published')->nullable();
            $table->boolean('home')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fiveupmedia_myhome_units');
    }
}
