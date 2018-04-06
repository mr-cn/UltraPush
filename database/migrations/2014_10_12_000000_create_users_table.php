<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();

			$table->string('verifyCode'); // 账户验证代码
			$table->boolean('verified')->default(false); // 是否已验证

			$table->boolean('sendable')->default(true); // 是否允许推送
			$table->json('addressee')->nullable(); // 该用户的 Kindle 邮箱
			/*
			 * JSON 范例：sendtime 为TIME类型(HH:MM:SS)
			 * [{"address":"example@kindle.cn","sendtime":"12:00:00","last_state":"none"}]
			 */

			$table->integer('group_id')->nullable(); // 用户组ID
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
