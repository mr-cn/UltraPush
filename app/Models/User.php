<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'verifyCode'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * 应该被转换成原生类型的属性。
	 *
	 * @var array
	 */
	protected $casts = [
		'addressee' => 'array',
	];

	/**
	 * 获得此用户所属的用户组。
	 */
	public function group()
	{
		return $this->belongsTo('App\Models\Group');
	}

	/**
	 * 获得此用户订阅的推送项目。
	 */
	public function books()
	{
		return $this->belongsToMany('App\Models\Book')->withPivot('option');
	}
}
