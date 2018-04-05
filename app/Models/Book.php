<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	/**
	 * 应该被转换成原生类型的属性。
	 *
	 * @var array
	 */
	protected $casts = [
		'option' => 'array',
	];
}
