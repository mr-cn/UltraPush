<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BookUser extends Pivot
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