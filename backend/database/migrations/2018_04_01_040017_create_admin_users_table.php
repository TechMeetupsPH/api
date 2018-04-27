<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_users', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('email')->default('');
			$table->string('password');
			$table->string('reset_password_token')->nullable();
			$table->dateTime('reset_password_sent_at')->nullable();
			$table->dateTime('remember_created_at')->nullable();
			$table->integer('sign_in_count')->nullable()->default(0);
			$table->dateTime('current_sign_in_at')->nullable();
			$table->dateTime('last_sign_in_at')->nullable();
			$table->string('current_sign_in_ip')->nullable();
			$table->string('last_sign_in_ip')->nullable();
			$table->string('role', 25)->nullable()->default('superadmin');
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
		Schema::drop('admin_users');
	}

}
