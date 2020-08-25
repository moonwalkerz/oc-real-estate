<?php namespace FiveUpMedia\Myhome\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFiveupmediaMyhomeApartments extends Migration
{
    public function up()
    {
        Schema::create('fiveupmedia_myhome_apartments', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('unit_id')->default(0);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->boolean('published')->default(1);
            $table->boolean('home')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fiveupmedia_myhome_apartments');
    }
}
