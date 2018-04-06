<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	/**
	 * 获得订阅此推送项目的用户。
	 */
	public function users()
	{
		return $this->belongsToMany('App\Models\User')->using('App\Models\BookUser')->withPivot('option');
	}
}
