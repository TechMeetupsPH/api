<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetup', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('detail');
            $table->string('address');
            $table->string('summary_image_url')->nullable();
            $table->string('city');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetup');
    }
}
