<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	/**
	 * 获得此用户组下的用户。
	 */
	public function users()
	{
		return $this->hasMany('App\Models\User');
	}
}
