<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function (Blueprint $table) {
			$table->increments('id');
			$table->string('plugin'); // 采集插件的唯一ID
			$table->string('name'); // 显示名
			$table->text('description'); // 描述
			$table->string('tag'); // 分类标签
			$table->timestamps();
		});
		Schema::create('book_user', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('book_id');
			$table->integer('user_id');
			$table->json('option')->nullable(); // 采集参数，如 RSS 地址（由采集插件定义格式）
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
		Schema::dropIfExists('books');
		Schema::dropIfExists('book_user');
	}
}
