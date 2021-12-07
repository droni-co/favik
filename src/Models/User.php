<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name',
      'email',
      'password',
      'status',
      'firstName',
      'gender',
      'city',
      'country',
      'crm_id',
      'origin_id',
      'total_purchases',
      'orders_count',
      'created_at',
      'email_verified_at',
      'dob',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password',
      'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];
  public function items() {
    return $this->hasMany('App\Models\Item');
  }
  public function orders() {
    return $this->hasMany('App\Models\Order');
  }
  public function roles() {
    return $this->hasMany(Role::class);
  }
}