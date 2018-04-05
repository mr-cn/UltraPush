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
			$table->boolean('verified'); // 是否已验证

			$table->boolean('sendable'); // 是否暂停了推送
			$table->json('addressee'); // 该用户的 Kindle 邮箱
			/*
			 * JSON 范例：sendtime 为TIME类型(HH:MM:SS)
			 * [{"address":"example@kindle.cn","sendtime":"12:00:00"}]
			 */

			$table->integer('group_id'); // 用户组ID
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
