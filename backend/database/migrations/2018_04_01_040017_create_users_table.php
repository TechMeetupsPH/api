<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('email')->default('')->unique('index_users_on_email');
			$table->string('password', 128);
			$table->string('reset_password_token')->nullable()->unique('index_users_on_reset_password_token');
			$table->dateTime('reset_password_sent_at')->nullable();
			$table->dateTime('remember_created_at')->nullable();
			$table->text('remember_token', 65535);
			$table->integer('age')->nullable();
			$table->string('country')->nullable();
			$table->string('region')->nullable();
			$table->string('city')->nullable();
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('mobile_number')->nullable();
			$table->string('gender')->nullable();
			$table->string('unconfirmed_email')->nullable();
			$table->string('fbuid')->nullable();
			$table->string('fbname')->nullable();
			$table->string('guid')->nullable();
			$table->string('confirmation_token')->nullable();
			$table->dateTime('confirmed_at')->nullable();
			$table->dateTime('confirmation_sent_at')->nullable();
			$table->dateTime('last_sign_in_at')->nullable();
			$table->string('last_sign_in_ip')->nullable();
			$table->string('browser_token')->nullable();
			$table->boolean('is_signed_in')->nullable()->default(0);
			$table->dateTime('current_sign_in_at')->nullable();
			$table->integer('sign_in_count')->nullable()->default(0);
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
		Schema::drop('users');
	}

}
