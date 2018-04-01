<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateManualSignupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('manual_signups', function(Blueprint $table)
		{
			$table->integer('event_id')->unsigned()->nullable();
			$table->string('email')->nullable();
			$table->string('name')->nullable()->default('jane');
			$table->string('contact_number')->nullable();
			$table->boolean('going')->nullable()->default(1);
			$table->integer('bringing_guests')->nullable()->default(0);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('manual_signups');
	}

}
